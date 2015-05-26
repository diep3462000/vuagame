<?php

require_once dirname(__FILE__).'/../lib/vtpManageLinkGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/vtpManageLinkGeneratorHelper.class.php';

/**
 * vtpManageLink actions.
 *
 * @package    Vt_Portals
 * @subpackage vtpManageLink
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtpManageLinkActions extends autoVtpManageLinkActions
{
    public function executeIndex(sfWebRequest $request)
    {
        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
        {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page'))
        {
            $this->setPage($request->getParameter('page'));
        }
        else
        {
            $this->setPage(1);
        }

        // max per page
        if ($request->getParameter('max_per_page'))
        {
            $this->setMaxPerPage($request->getParameter('max_per_page'));
        }else{
            $this->setMaxPerPage(10);
        }

        $this->sidebar_status = $this->configuration->getListSidebarStatus();
        $this->pager = $this->getPager();

        //Start - thongnq1 - 03/05/2013 - fix loi xoa du lieu tren trang danh sach
        if ($request->getParameter('current_page'))
        {
            $current_page = $request->getParameter('current_page');
            $this->setPage($current_page);
            $this->pager = $this->getPager();
        }
        //end thongnq1

        $this->sort = $this->getSort();
    }

    protected function getPager()
    {
        $query = $this->buildQuery();
        $query->andWhere('portal_id=?',sfContext::getInstance()->getUser()->getAttribute('portal',0));
        $query->andWhere('lang=?',sfContext::getInstance()->getUser()->getCulture());
        $query->orderby('group_id, priority');
        $pages = ceil($query->count() / $this->getMaxPerPage());
        $pager = $this->configuration->getPager('VtpLink');
        $pager->setQuery($query);
        $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
        $pager->init();

        return $pager;
    }
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                
                $vtp_link = $form->save();
                $vtp_link->lang=sfContext::getInstance()->getUser()->getCulture();
                $slug=removeSignClass::removeSign($vtp_link->name);

                $objCat = count(VtpLinkTable::checkSlug($slug, $vtp_link->id));
                while ($objCat>0){
                    $slug=$slug.'_'.VtHelper::generateString(5);
                    $objCat = count(VtpLinkTable::checkSlug($slug,$vtp_link->id));
                }
                //xử lý đường link khi chọn Trang
                $vals = $form->getValues();
                
                if($vals['type']=='2'){
                    $id_cat = $request->getParameter('category_type');
                    $slug_category = '';
                    if($id_cat != 0 && $id_cat !=null){
                        $slug_category = VtpCategoryTable::getSlugById($id_cat);
                        $vtp_link->link='@'.$vals['page'].'?slug='.$slug_category['slug'];
                    }
                    else if($id_cat==0 && $id_cat !=null){
                        $vtp_link->link='@'.$vals['page'];
                    }
                    else{
                        $vtp_link->link='@'.$vals['page'].'?slug='.$slug;
                    }
                    
                }
                //end
                $vtp_link->slug=$slug;
                $vtp_link->save();
                //Cap nhat user type cho link
//                VtpLinkTypeUserTable::deleteTypeUser($vtp_link->id);
//                $vals = $form->getValues();
//                if (is_array(explode(',',$vals['user_type']))){
//                    foreach (explode(',',$vals['user_type']) as $val) {
//                        if ($val!=''){
//                            $vtp_user_type= new VtpLinkTypeUser();
//                            $vtp_user_type->link_id=$vtp_link->id;
//                            $vtp_user_type->user_type=$val;
//                            $vtp_user_type->save();
//                        }
//                    }
//                }
                //end
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $vtp_link)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@vtp_link');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@vtp_link_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'vtp_link_edit', 'sf_subject' => $vtp_link));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
    
    //Xoa du lieu
    public function executeDelete(sfWebRequest $request)
  {
//    $request->checkCSRFProtection();
    $i18n = sfContext::getInstance()->getI18N();
    $form = new BaseForm();
    $form->bind($form->isCSRFProtected() ? array($form->getCSRFFieldName() => $request->getParameter($form->getCSRFFieldName())) : array());

    if (!$form->isValid()) {
        $this->getUser()->setFlash('error', $i18n->__('Token không hợp lệ.'));
        $this->redirect('@vtp_link');
    }
    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    VtpLinkTypeUserTable::deleteTypeUser($this->getRoute()->getObject()->getId());
    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@vtp_link');
  }

  public function executeBatch(sfWebRequest $request)
  {
//    $request->checkCSRFProtection();
    $i18n = sfContext::getInstance()->getI18N();
    $form = new BaseForm();
    $form->bind($form->isCSRFProtected() ? array($form->getCSRFFieldName() => $request->getParameter($form->getCSRFFieldName())) : array());

    if (!$form->isValid()) {
        $this->getUser()->setFlash('error', $i18n->__('Token không hợp lệ.'));
        $this->redirect('@vtp_link');
    }
    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@vtp_link');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@vtp_link');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'VtpLink'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error','A problem occurs when deleting the selected items some items do not exist anymore.');
    }

    $this->redirect('@vtp_link');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('VtpLink')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));
      VtpLinkTypeUserTable::deleteTypeUser($record->getId());
      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@vtp_link');
  }
}

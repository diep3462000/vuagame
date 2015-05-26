<?php

require_once dirname(__FILE__).'/../lib/vtpManageAlbumGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/vtpManageAlbumGeneratorHelper.class.php';

/**
 * vtpManageAlbum actions.
 *
 * @package    Vt_Portals
 * @subpackage vtpManageAlbum
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtpManageAlbumActions extends autoVtpManageAlbumActions
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
      $query->orderBy("priority");
      $pages = ceil($query->count() / $this->getMaxPerPage());
      $pager = $this->configuration->getPager('VtpAlbum');
      $pager->setQuery($query);
      $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
      $pager->init();

      return $pager;
    }
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        //Xóa photo
        $ids = $request->getParameter('id');
        VtpPhotoTable::deleteImageByAlbum($ids);

        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        if ($this->getRoute()->getObject()->delete())
        {
            $this->getUser()->setFlash('success', 'The item was deleted successfully.');
        }

        $this->redirect('@vtp_album');
    }

    protected function executeBatchDelete(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        //Xóa photo
        VtpPhotoTable::deleteImageByAlbum($ids);
        $records = Doctrine_Query::create()
            ->from('VtpAlbum')
            ->whereIn('id', $ids)
            ->execute();

        foreach ($records as $record)
        {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

            $record->delete();
        }

        $this->getUser()->setFlash('success', 'The selected items have been deleted successfully.');
        $this->redirect('@vtp_album');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $vtp_album = $form->save();
        $vtp_album->lang=sfContext::getInstance()->getUser()->getCulture();
//        $vtp_album->description = trim($vtp_album->getDescription());
        $slug=removeSignClass::removeSign($vtp_album->getName());
        $objCat = count(VtpAlbumTable::checkSlug($slug, $vtp_album->getId()));
        while ($objCat>0){
            $slug=$slug.'_'.VtHelper::generateString(5);
            $objCat = count(VtpAlbumTable::checkSlug($slug,$vtp_album->getId()));
        }
        $vtp_album->slug=$slug;
        $vtp_album->save();
        if($vtp_album->getIsDefault()==1){
            VtpAlbumTable::updateDefault($vtp_album->getId());
        }

          //tra ve danh sach bai viet chi tiet thuoc thuoc dich vu
          $id = $this->vtp_album->getId();
          $pagerDetail = new sfDoctrinePager('VtpPhoto', $maxPerPage);
          $pagerDetail->setQuery(VtpPhotoTable::getPhotoByAlbumId($id));
          $pagerDetail->setPage($this->getPageSubCategory());
          $pagerDetail->init();
          if($pagerDetail){
              $this->pager = $pagerDetail;
          }
          else $this->pager = 0;

          $this->sort = $this->getSort();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $vtp_album)));

      if ($request->hasParameter('_save_and_exit'))
      {
        $this->getUser()->setFlash('success', $notice);
        $this->redirect('@vtp_album');
      } elseif ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('success', $notice.' You can add another one below.');

        $this->redirect('@vtp_album_new');
      }
      else
      {
        $this->getUser()->setFlash('success', $notice);

        $this->redirect(array('sf_route' => 'vtp_album_edit', 'sf_subject' => $vtp_album));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        if(!$form->getObject()->isNew() ){
            if ($request->getParameter('page')) {
                $this->setPagePhoto($request->getParameter('page'));
            } else
                $this->setPagePhoto(1);
            // max per page
            if ($request->getParameter('max_per_page')) {
                $this->setMaxPerPagePhoto($request->getParameter('max_per_page'));
                $maxPerPage = $request->getParameter('max_per_page');
            } else {
                $maxPerPage = $this->getMaxPerPagePhoto();
            }
            //tra ve danh sach bai viet chi tiet thuoc thuoc dich vu
            $id = $this->vtp_album->getId();
            $pagerDetail = new sfDoctrinePager('VtpPhoto', $maxPerPage);
            $pagerDetail->setQuery(VtpPhotoTable::getPhotoByAlbumId($id));
            $pagerDetail->setPage($this->getPageSubCategory());
            $pagerDetail->init();
            if($pagerDetail){
                $this->pager = $pagerDetail;
            }
            else $this->pager = 0;

            $this->sort = $this->getSort();
        }
    }
  }
    
  public function executeEdit(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getEditSidebarStatus();
    $this->vtp_album = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->vtp_album);
    $this->fields = $this->vtp_album->getTable()->getColumnNames();
    
    if ($request->getParameter('page')) {
      $this->setPagePhoto($request->getParameter('page'));
    } else
      $this->setPagePhoto(1);
    // max per page
    if ($request->getParameter('max_per_page')) {
      $this->setMaxPerPagePhoto($request->getParameter('max_per_page'));
      $maxPerPage = $request->getParameter('max_per_page');
  } else {
      $maxPerPage = $this->getMaxPerPagePhoto();
  }
    //tra ve danh sach bai viet chi tiet thuoc thuoc dich vu
    $id = $this->vtp_album->getId();
    $pagerDetail = new sfDoctrinePager('VtpPhoto', $maxPerPage);
    $pagerDetail->setQuery(VtpPhotoTable::getPhotoByAlbumId($id));
    $pagerDetail->setPage($this->getPageSubCategory());
    $pagerDetail->init();
    if($pagerDetail){
        $this->pager = $pagerDetail;
    }
    else $this->pager = 0;
    
    $this->sort = $this->getSort(); 
    
  }
  
  protected function setPagePhoto($page)
  {
    $this->getUser()->setAttribute('vtpManagePhoto.page', $page, 'admin_module');
  }
  
   protected function setMaxPerPagePhoto($max_per_page)
  {
    $this->getUser()->setAttribute('vtpManagePhoto.max_per_page', (integer) $max_per_page, 'admin_module');
  }
  
  protected function getMaxPerPagePhoto()
  {
    return $this->getUser()->getAttribute('vtpManagePhoto.max_per_page', sfConfig::get('app_default_max_per_page', 20), 'admin_module');
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('vtpManagePhoto.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('vtpManagePhoto.page', 1, 'admin_module');
  }
  
  protected function getPageSubCategory()
  {
    return $this->getUser()->getAttribute('vtpManagePhoto.page', 1, 'admin_module');
  }
  
}

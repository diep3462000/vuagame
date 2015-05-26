<?php

require_once dirname(__FILE__).'/../lib/vtManageAdvertisesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/vtManageAdvertisesGeneratorHelper.class.php';

/**
 * vtManageAdvertises actions.
 *
 * @package    Vt_Portals
 * @subpackage vtManageAdvertises
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtManageAdvertisesActions extends autoVtManageAdvertisesActions
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

    public function executeEdit(sfWebRequest $request)
    {
        $this->sidebar_status = $this->configuration->getEditSidebarStatus();
        $this->vtp_advertise = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->vtp_advertise);
        $this->fields = $this->vtp_advertise->getTable()->getColumnNames();

        if ($request->getParameter('page')) {
            $this->setPageParam($request->getParameter('page'));
        } else
            $this->setPageParam(1);
        // max per page
        if ($request->getParameter('max_per_page')) {
            $this->setMaxPerPageParam($request->getParameter('max_per_page'));
            $maxPerPage = $request->getParameter('max_per_page');
        } else {
            $maxPerPage = $this->getMaxPerPageParam();
        }
        //tra ve danh sach hinh anh trong album
        $id = $this->vtp_advertise->getId();
        $pagerDetail = new sfDoctrinePager('VtpAdvertiseImage', $maxPerPage);
        $pagerDetail->setQuery(VtpAdvertiseImageTable::getImageByAdvertiseIdOrderByPriority($id));
        $pagerDetail->setPage($this->getPageSubCategory());
        $pagerDetail->init();
        $this->pager = $pagerDetail;
        $this->sort = $this->getSort();
        $this->getUser()->setAttribute('vtManageAdvertiseImages.adid', (integer)$id, 'admin_module');
    }

    protected function setMaxPerPageParam($max_per_page)
    {
        $this->getUser()->setAttribute('vtManageAdvertiseImages.max_per_page', (integer)$max_per_page, 'admin_module');
    }

    protected function setPageParam($page)
    {
        $this->getUser()->setAttribute('vtManageAdvertiseImages.page', $page, 'admin_module');
    }

    protected function getMaxPerPageParam()
    {
        return $this->getUser()->getAttribute('vtManageAdvertiseImages.max_per_page', 10, 'admin_module');
    }

    protected function getPageSubCategory()
    {
        return $this->getUser()->getAttribute('vtManageAdvertiseImages.page', 1, 'admin_module');
    }

    public function executeBatchImage(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        $i18n = $this->getContext()->getI18N();
        $ids = $request->getParameter('ids');

        if (!$ids = $request->getParameter('ids')) {
            $this->getUser()->setFlash('errorImage', $i18n->__('Bạn phải chọn ít nhất một bản ghi để thực hiện thao tác.'));
            $this->redirect($request->getReferer());
        }

        $records = Doctrine_Query::create()
            ->from('VtpAdvertiseImage')
            ->whereIn('id', $ids)
            ->execute();

        foreach ($records as $record)
        {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

            $record->delete();
        }

        $this->getUser()->setFlash('successImage', 'The selected items have been deleted successfully.');
        //set lại page trong truong hop xoa toan bo du lieu tren trang
        $adId= $this->getUser()->getAttribute('vtManageAdvertiseImages.adid', -1, 'admin_module');
        $vtp_advertise = VtpAdvertiseTable::getAdvertiseById($adId);

        $page=$this->getUser()->getAttribute('vtManageAdvertiseImages.page', array(), 'admin_module');
        if ($page >= $request->getParameter('lastPage')){
            $page=$page-1;
        }

        if ($page>1){
            $this->redirect(array('sf_route' => 'vtp_advertise_edit', 'sf_subject' => $vtp_advertise, 'page' => $page));
        }else{
            $this->redirect(array('sf_route' => 'vtp_advertise_edit', 'sf_subject' => $vtp_advertise));
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        //Xóa hình ảnh quảng cáo
        $id=$request->getParameter('id');
        VtpAdvertiseImageTable::deleteImageByAdvertise($id);
        //Xóa quảng cáo
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        if ($this->getRoute()->getObject()->delete())
        {
            $this->getUser()->setFlash('success', 'The item was deleted successfully.');
        }

        $this->redirect('@vtp_advertise');
    }

    protected function executeBatchDelete(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        //Xóa hình ảnh quảng cáo
        VtpAdvertiseImageTable::deleteImageByAdvertise($ids);
        $records = Doctrine_Query::create()
            ->from('VtpAdvertise')
            ->whereIn('id', $ids)
            ->execute();

        foreach ($records as $record)
        {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

            $record->delete();
        }

        $this->getUser()->setFlash('success', 'The selected items have been deleted successfully.');
        $this->redirect('@vtp_advertise');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $vtp_advertise = $form->save();
                //cap nhat advertise vao localtion
                $vals = $form->getValues();
//                var_dump($vals['location_list']);die;
                if (count($vals['location_list'])>0){
                    VtpAdvertiseLocationTable::updateLocationAdvertise($vtp_advertise->id,$vals['location_list']);
                }

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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $vtp_advertise)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@vtp_advertise');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@vtp_advertise_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'vtp_advertise_edit', 'sf_subject' => $vtp_advertise));
            }
        }
        else
        {
            if(!$form->getObject()->isNew() ){
                if ($request->getParameter('page')) {
                    $this->setPageParam($request->getParameter('page'));
                } else
                    $this->setPageParam(1);
                // max per page
                if ($request->getParameter('max_per_page')) {
                    $this->setMaxPerPageParam($request->getParameter('max_per_page'));
                    $maxPerPage = $request->getParameter('max_per_page');
                } else {
                    $maxPerPage = $this->getMaxPerPageParam();
                }
                //tra ve danh sach hinh anh trong album
                $id = $form->getObject()->getId();
                $pagerDetail = new sfDoctrinePager('VtpAdvertiseImage', $maxPerPage);
                $pagerDetail->setQuery(VtpAdvertiseImageTable::getImageByAdvertiseId($id));
                $pagerDetail->setPage($this->getPageSubCategory());
                $pagerDetail->init();
                $this->pager = $pagerDetail;
                $this->sort = $this->getSort();
                $this->getUser()->setAttribute('vtManageAdvertiseImages.adid', (integer)$id, 'admin_module');
            }



            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }


    protected function getPager()
    {
        $query = $this->buildQuery();
        $query->andWhere('portal_id=?',sfContext::getInstance()->getUser()->getAttribute('portal',0));
        $query->orderby('name asc');
        $pages = ceil($query->count() / $this->getMaxPerPage());
        $pager = $this->configuration->getPager('VtpAdvertise');
        $pager->setQuery($query);
        $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
        $pager->init();

        return $pager;
    }
}

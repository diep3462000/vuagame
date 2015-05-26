<?php

require_once dirname(__FILE__) . '/../lib/vtManageAdvertiseLocationGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/vtManageAdvertiseLocationGeneratorHelper.class.php';

/**
 * vtManageAdvertiseLocation actions.
 *
 * @package    Vt_Portals
 * @subpackage vtManageAdvertiseLocation
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtManageAdvertiseLocationActions extends autoVtManageAdvertiseLocationActions {
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


    public static function getAliasPageAttribute($attrName) {
        $pageAttr = Attributes::getAttributesList('view_page');
        return $pageAttr[$attrName];
    }

    public static function getAliasTemplateAttribute($attrName) {
        $pageAttr = Attributes::getAttributesList('advertise_template');
        return $pageAttr[$attrName];
    }

    protected function getPager() {
        $query = $this->buildQuery();
        $query->andWhere('portal_id=?',sfContext::getInstance()->getUser()->getAttribute('portal',0));
        $query->orderby('priority asc');
        $pages = ceil($query->count() / $this->getMaxPerPage());
        $pager = $this->configuration->getPager('VtpAdvertiseLocation');
        $pager->setQuery($query);
        $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
        $pager->init();

        return $pager;
    }

}

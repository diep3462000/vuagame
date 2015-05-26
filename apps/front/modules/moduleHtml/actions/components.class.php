<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/7/14
 * Time: 2:56 PM
 * To change this template use File | Settings | File Templates.
 */
class moduleHtmlComponents extends sfComponents
{
    public function executeViewContent()
    {
        $slug=sfContext::getInstance()->getRequest()->getParameter('slug');
        if($slug!=''){
           $this->viewContent=VtpHtmlTable::getHtmlByHtml($slug,VtCommonEnum::portalDefault);
        }

    }
}
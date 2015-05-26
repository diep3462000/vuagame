<?php

/**
 * Created by JetBrains PhpStorm.
 * User: diepth2
 * Date: 5/6/14
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class moduleAdvertiseComponents extends sfComponents
{
    public function executeTopOne()
    {
        $page = sfContext::getInstance()->getRouting()->getCurrentRouteName();
        $this->advertise = VtpAdvertiseTable::getAdvertise($page, 'topone',VtCommonEnum::portalDefault);
    }

    public function executeAccount(){
        $page = sfContext::getInstance()->getRouting()->getCurrentRouteName();
        $this->advertise = VtpAdvertiseTable::getAdvertise($page, 'bottom',VtCommonEnum::portalDefault);

        $limit = $this->getVar('limit');
        $this->isAuth=$this->getVar('isAuth');
        if (!isset($limit))
            $limit = 3;
        $arrGroup=  Attributes::getAll('link_group');
        if(is_array($arrGroup)){
            $group_id = $arrGroup['acount']['value'];
            $linkAccount = VtpLinkTable::getLinkByGroupId($group_id,$limit,VtCommonEnum::portalDefault);
            $this->account = $linkAccount;
        }
    }
}

<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class commonComponents extends sfComponents
{
    public function executeHeader()
    {
        
    }

    public function executeSlide()
    {
    }

    public function executeNavTop()
    {
		$user=sfContext::getInstance()->getUser();
        $this->isAuth=$user->isLogin();
        $this->userName=$user->getUsername();
		
		//$this->isAuth=true;
        //$this->userName='0978097098';
    }

    public function executeFooter()
    {
    }
    public function executePagination($request) {

    }
    public function executePagging($request) {

    }

    public function executePaggingNew($request)
    {

    }
	
	 public function executeMessageLogin()
    {
    }
}

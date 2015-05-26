<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 11:08 AM
 * To change this template use File | Settings | File Templates.
 */
class moduleMenuComponents extends sfComponents
{
    public function executeMainMenu()
    {
        $request=sfContext::getInstance()->getRequest();
        $this->slug_menu=$request->getParameter('slug_menu');
        $limit = 8;//$this->getVar('limit', 8);
        $this->menuTree = VtpMenuTable::getMenuTree('0', sfContext::getInstance()->getRouting()->getCurrentRouteName(), $request->getParameter('slug'), null, $limit);
		
        if (empty($this->menuTree))
            return sfView::NONE;
    }

    public function executeFooterMenu()
    {
        $this->menuFooter = VtpMenuTable::getMenuFooterByPortal(sfContext::getInstance()->getUser()->getAttribute('portal', 0), 1, 0, 8);
    }
    
    public function executeMenuNavArticle()
    {
    }

    public function executeBuildMenuGame(){
        $request=sfContext::getInstance()->getRequest();
        $this->slug_menu=$request->getParameter('slug_menu');
        $limit = 8;//$this->getVar('limit', 8);
        $this->menuTree = VtpMenuTable::getMenuTree('0', sfContext::getInstance()->getRouting()->getCurrentRouteName(), $request->getParameter('slug'), null, $limit);

        if (empty($this->menuTree))
            return sfView::NONE;
    }
}
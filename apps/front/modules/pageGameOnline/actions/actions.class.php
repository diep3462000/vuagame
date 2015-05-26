<?php

/**
 * pageHome actions.
 *
 * @package    Vt_Portals
 * @subpackage pageHome
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageGameOnlineActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
        $slug = $request->getParameter('slug');
        $this->game = $slug;
    }

}

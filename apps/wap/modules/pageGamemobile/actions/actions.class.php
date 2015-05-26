<?php

/**
 * pageHome actions.
 *
 * @package    Vt_Portals
 * @subpackage pageHome
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageGamemobileActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {

    }
    public function executeTest(sfWebRequest $request)
    {
        $g_user = new GUser();
        $username ='diep123';
        $g_user->setUsername($username);
        $g_user->setGameCash(50000);
        $g_user->setIp(VtHelper::getRealIpAddr());
        $g_user->setStartPlayingTime(date('Y-m-d'));
        $g_user->setGiftTimes(0);
        $g_user->setCurrentGame(0);
        $g_user->setDevice(VtHelper::getDeviceIp());
        $g_user->setIsOnline(true);
        $g_user->setIsMobile(true);
        $g_user->setLevelId(1);
        $g_user->setAvatarId(1);
        $g_user->save();
        die;

    }
}

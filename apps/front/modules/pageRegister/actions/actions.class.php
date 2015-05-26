<?php

/**
 * pageHome actions.
 *
 * @package    Vt_Portals
 * @subpackage pageHome
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageRegisterActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $form = new UserFormRegister();
        $this->form = $form;
        if ($request->isMethod('post')) {
            $values = $request->getParameter($form->getName());
            $form->bind($values);
            if ($form->isValid()) {
                $objUser = new User();
                $username = $values['username'];
                $objUser->setUsername($username);
                $objUser->setIsActive(1);
                $salt = md5(rand(100000, 999999) . $username);
                $objUser->setSalt($salt);
                //Tạo Algorithm
                $algorithm = sfConfig::get('app_sf_guard_plugin_algorithm_callable', 'sha1');
                $algorithmAsStr = is_array($algorithm) ? $algorithm[0] . '::' . $algorithm[1] : $algorithm;
                $objUser->setAlgorithm($algorithmAsStr);
                //Tạo Password
                $objUser->setPassword(md5($values['password']));
                $objUser->setRegisterDate(date('Y-m-d H:i:s'));
                $objUser->save();
                
                $g_user = new GUser();

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
            }
        }
    }
}

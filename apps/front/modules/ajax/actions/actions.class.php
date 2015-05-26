<?php

/**
 * pageHome actions.
 *
 * @package    Vt_Portals
 * @subpackage pageHome
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ajaxActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeLogin(sfWebRequest $request)
    {
//        if (!$request->isXmlHttpRequest()) die('Truy cap khong hop le!');
        $username = $request->getParameter('username');
        $password = $request->getParameter('password');
        $token = $request->getParameter('token');
        /*$form = new UserFormLogin();
        if ($token != $form->getCSRFToken()) {
            $arrReturn = array(
                'errCode' => 1,
                'errMessage' => 'Error token'
            );
        } else*/
        {
            $getUserByUsername = UserTable::getInstance()->getUserByUsername($username);
            $gameByUser = GUserTable::getInstance()->getUserByUsername($username);
            $gmoney = $gameByUser? $gameByUser->getGameCash() : 0;
            if ($getUserByUsername) {
//                $passwordVal = VtHelper::SHA1EncryptPassword($getUserByUsername->getAlgorithm(), $getUserByUsername->getSalt(), $password);
                //            $userLogin = VtpUsersTable::checkUserLogin($username, $passwordVal);
                $passwordVal = md5($password);
                if ($getUserByUsername->password == $passwordVal) {
                    //                $lockedUser = VtpUsersTable::checkExistedUser($username, VtCommonEnum::NUMBER_ONE);
                    if ($getUserByUsername->is_active != VtCommonEnum::NUMBER_ONE) {
                        //User bi khoa
                        $arrReturn = array(
                            'errCode' => 2,
                            'errMessage' => 'Tài khoản của bạn chưa được kích hoạt!'
                        );
//                        die('Tài khoản của bạn chưa được kích hoạt!');
                    } else {
                        $arrReturn = array(
                            'errCode' => 0,
                            'errMessage' => 'Đăng nhập thành công!',
                            'username' => $getUserByUsername->getFullname()? $getUserByUsername->getFullname(): $getUserByUsername->getUsername(),
                            'money' => number_format($gmoney)
                        );
                        VtHelper::setAuthenticated($getUserByUsername, true);
                    }

                } else {
                    $arrReturn = array(
                        'errCode' => 3,
                        'errMessage' => 'Tài khoản hoặc mật khẩu không đúng!'
                    );
//                    die('Tài khoản hoặc mật khẩu không đúng!');
                }
            } else {
                $arrReturn = array(
                    'errCode' => 4,
                    'errMessage' => 'Tài khoản chưa được đăng ký!'
                );
//                die('Tài khoản chưa được đăng ký!');
            }
        }
        return $this->renderText(json_encode($arrReturn));
    }

    public function executeRegister(sfWebRequest $request)
    {
//        if (!$request->isXmlHttpRequest()) die('Truy cap khong hop le!');
        $username = $request->getParameter('username');
        $password = trim($request->getParameter('password'));
        $repass = trim($request->getParameter('repass'));
        $token = $request->getParameter('token');

        $form = new UserFormRegister();
        if ($token != $form->getCSRFToken()) {
            $arrReturn = array(
                'errCode' => 1,
                'errMessage' => 'Error token'
            );
        } else {
            $objUser = UserTable::getInstance()->getUserByUsername($username);
            if ($objUser) { // co user da dk
                $arrReturn = array(
                    'errCode' => 2,
                    'errMessage' => 'Username đã được đăng ký.'
                );
            } else { // chua co user dk
                if ($password == $repass) {
                    $objUser = new User();
                    $objUser->setUsername($username);
                    $objUser->setIsActive(1);
                    $salt = md5(rand(100000, 999999) . $username);
                    $objUser->setSalt($salt);
                    //Tạo Algorithm
                    $algorithm = sfConfig::get('app_sf_guard_plugin_algorithm_callable', 'sha1');
                    $algorithmAsStr = is_array($algorithm) ? $algorithm[0] . '::' . $algorithm[1] : $algorithm;
                    $objUser->setAlgorithm($algorithmAsStr);
                    //Tạo Password
                    $objUser->setPassword(md5($password));
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

                    VtHelper::setAuthenticated($objUser, true);
                    $arrReturn = array(
                        'errCode' => 0,
                        'errMessage' => 'Đăng ký tài khoản thành công.',
                        'cash'  => number_format($g_user->getGameCash()),
                        'user_id' => $objUser->getId()
                    );
                } else { // pas ko giong nhau
                    $arrReturn = array(
                        'errCode' => 3,
                        'errMessage' => 'Mật khẩu và mật khẩu nhập lại không giống nhau!'
                    );
                }
            }
        }
        return $this->renderText(json_encode($arrReturn));
    }

    public function executeLogout(sfWebRequest $request)
    {
        $user = sfContext::getInstance()->getUser();
        $user->logout();
        if ($user->isLogin()) {
            $arrReturn = array(
                'errCode' => 1,
                'errMessage' => 'Logout không thành công.'
            );
        } else {
            $arrReturn = array(
                'errCode' => 0,
                'errMessage' => 'Logout thành công.'
            );
        }
        return $this->renderText(json_encode($arrReturn));
    }

    public function executeLoginTrue(sfWebRequest $request)
    {
        $user = sfContext::getInstance()->getUser();
        if ($user->isLogin()) {
            $objUser = $user->getMember();
            $arrReturn = array(
                'errCode' => 0,
                'errMessage' => 'Đăng nhập thành công.',
                'username' => $objUser->username,
            );
        } else {
            $arrReturn = array(
                'errCode' => 1,
                'errMessage' => 'User chưa đăng nhập.'
            );
        }
        return $this->renderText(json_encode($arrReturn));
    }

    public function executeCheckFlash(sfWebRequest $request)
    {
//        session_start();
//        include_once '/lib/gate/config.php';
//        include_once '/lib/gate/include.php';
        $userId = sfContext::getInstance()->get;

        $username = $_SESSION[User::$SESSION_USER_USERNAME];
        $password = $_SESSION[User::$SESSION_USER_PASSWORD];
        $userMoney = 300;
        $level = 2;
        $zoneId = 5;
        if (!sfContext::getInstance()->getUser()->isLogin()) {
            $json = "{msg:Bạn chưa đăng nhập hệ thống vui lòng đăng nhập,success:false}";
        } else {
            $user = sfContext::getInstance()->getUser();
        }
        if ($userId != null) {
            $json = array('username' => $username, 'password' => $password, 'money' => $userMoney, 'level' => $level, 'zoneId' => $zoneId, 'success' => true);

            echo json_encode($json);
        } else {
            $json = array('msg' => "Bạn chưa đăng nhập hệ thống vui lòng đăng nhập", 'success' => false);
            echo json_encode($json);
        }
    }
        public function executeLoadClanPagination(sfWebRequest $request){
            //
            $i18n = sfContext::getInstance()->getI18N();
            //
            $pageID = ($request->getParameter('pageId') == 0 ? 1 : $request->getParameter('pageId'));
            $this->pageId = $pageID;
            $this->limit = 10;
            $offset = ($this->limit)*($pageID -1);
            $this->listClan = ClanTable::getListClan();
            $this->listClanPagination = ClanTable::getListClanPagination($this->limit, $offset);
        }

    public function executeCheckLoginAjax(sfWebRequest $request){
        //
        $i18n = sfContext::getInstance()->getI18N();
        $form = new BaseForm();
        if(!sfContext::getInstance()->getUser()->isLogin()){
            return $this->renderText(json_encode(array('status' => -2, 'notice' => $i18n->__('Bạn chưa đăng nhập hệ thống'))));
        }
//        if ($form->getCSRFToken() != $request->getParameter('token', 0)){
//            return $this->renderText(json_encode(array('status' => -1, 'notice' => $i18n->__('Giá trị token không hợp lệ.'))));
//        }
        return $this->renderText(json_encode(array('status' => 1, 'notice' => $i18n->__('Đăng nhập hợp lệ'))));


    }

}

<?php

/**
 * moduleHtml actions.
 *
 * @package    Vt_Portals
 * @subpackage moduleHtml
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
#require_once 'autoload.php';
class moduleLoginFbActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $facebook = new Facebook(array(
            'appId'  => '750753605046019',
            'secret' => '54720ab4cd72698c6a10029d8d2c027f',
        ));

        // Get User ID
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
        $user = $facebook->getUser();

        if ($user) {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $facebook->api('/me');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }

        // Login or logout url will be needed depending on current user state.
        if ($user) {
            $logoutUrl = $facebook->getLogoutUrl(array(
                'next'=>'http://localhost/fb/php/examples/logout.php'
            ));
            $objUser = UserTable::getUserByUid($user_profile['id']);
            if(!$objUser){
                $objUser = new User();
                $objUser->setUsername($user_profile['id']);
                $objUser->setEmail($user_profile['email']);
                $objUser->setFullname($user_profile['name']);
                $objUser->setAddress();

                $objUser->setIsActive(1);
                $salt = md5(rand(100000, 999999) . $user_profile['id']);
                $objUser->setSalt($salt);
                //Tạo Algorithm
                $algorithm = sfConfig::get('app_sf_guard_plugin_algorithm_callable', 'sha1');
                $algorithmAsStr = is_array($algorithm) ? $algorithm[0] . '::' . $algorithm[1] : $algorithm;
                $objUser->setAlgorithm($algorithmAsStr);
                //Tạo Password
                $objUser->setPassword(call_user_func_array($algorithm, array($salt . $user_profile['id'])));
                $objUser->setRegisterDate(date('Y-m-d H:i:s'));
                $objUser->setAvatar();
                $objUser->save();
            }
            $objGUser = GUserTable::getUserByUsername($user_profile['id']);
            if(!$objGUser){
                $g_user = new GUser();
                $g_user->setUsername($user['id']);
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
            VtHelper::setAuthenticated($objUser, true);
            $this->redirect('homepage');

        } else {
            $loginUrl = $facebook->getLoginUrl(array('scope' => 'email, read_stream'));
            $this->redirect($loginUrl);
        }


    }

    public function executeGoogle(sfWebRequest $request)
    {
        define('BASE_URL', filter_var('http://localhost:8070/', FILTER_SANITIZE_URL));

        define('CLIENT_ID','560391491007-jkluuevlkmo3er0jobvf4c15hkermm82.apps.googleusercontent.com');
        define('CLIENT_SECRET','8hlnL6vGkUTt6GETrBjqXF3i');
        define('REDIRECT_URI','http://vuagame.vn/logingoogle.html');//example:http://localhost/social/login.php?google,http://example/login.php?google
        define('APPROVAL_PROMPT','auto');
        define('ACCESS_TYPE','offline');


        $client = new Google_Client();
        $client->setApplicationName("Idiot Minds Google Login Functionallity");
        $client->setClientId(CLIENT_ID);
        $client->setClientSecret(CLIENT_SECRET);
        $client->setRedirectUri(REDIRECT_URI);
        $client->setApprovalPrompt(APPROVAL_PROMPT);
        $client->setAccessType(ACCESS_TYPE);
        $oauth2 = new Google_Oauth2Service($client);
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['token'] = $client->getAccessToken();
        }
        if (isset($_SESSION['token'])) {
            $client->setAccessToken($_SESSION['token']);
        }
        if (isset($_REQUEST['error'])) {
            echo '<script type="text/javascript">window.close();</script>'; exit;
        }
        $client->getAccessToken();
        if ($client->getAccessToken()) {
            $user = $oauth2->userinfo->get();

            $objUser = UserTable::getUserByUid($user['id']);
            if(!$objUser){
                $objUser = new User();
                $objUser->setUsername($user['id']);
                $objUser->setEmail($user['email']);
                $objUser->setFullname($user['name']);
                $objUser->setAddress();

                $objUser->setIsActive(1);
                $salt = md5(rand(100000, 999999) . $user['id']);
                $objUser->setSalt($salt);
                //Tạo Algorithm
                $algorithm = sfConfig::get('app_sf_guard_plugin_algorithm_callable', 'sha1');
                $algorithmAsStr = is_array($algorithm) ? $algorithm[0] . '::' . $algorithm[1] : $algorithm;
                $objUser->setAlgorithm($algorithmAsStr);
                //Tạo Password
                $objUser->setPassword(call_user_func_array($algorithm, array($salt . $user['id'])));
                $objUser->setRegisterDate(date('Y-m-d H:i:s'));
                $objUser->setAvatar();
                $objUser->save();

            }
            $objGUser = GUserTable::getUserByUsername($user['id']);
            if(!$objGUser){
                $g_user = new GUser();
                $g_user->setUsername($user['id']);
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

            VtHelper::setAuthenticated($objUser, true);
            $this->redirect('homepage');

            $_SESSION['User']=$user;
            $_SESSION['token'] = $client->getAccessToken();

        } else {
            $authUrl = $client->createAuthUrl();
            $this->redirect($authUrl);
        }

    }

}

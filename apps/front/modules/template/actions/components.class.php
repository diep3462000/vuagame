<?php

/**
 * pageHome actions.
 *
 * @package    VTP2.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class templateComponents extends sfComponents
{
    public function executeLoginCheck(sfWebRequest $request)
    {

    }
    public function executeFooter(sfWebRequest $request)
    {

    }

    public function executeLoginHeader(sfWebRequest $request)
    {
        $form = new UserFormLogin();
        if ($request->isMethod('post')) {
            $values = $request->getParameter($form->getName());
            $form->bind(($values));
            if ($form->isValid()) {
                $getUserByUsername = UserTable::getInstance()->getUserByUsername($values['username'])->fetchOne();
                if ($getUserByUsername) {
                    $password = $values['password'];
                    $passwordVal = VtHelper::SHA1EncryptPassword($getUserByUsername->getAlgorithm(), $getUserByUsername->getSalt(), $password);
                    //            $userLogin = VtpUsersTable::checkUserLogin($username, $passwordVal);
                    if ($getUserByUsername->password == $passwordVal) {
                        //                $lockedUser = VtpUsersTable::checkExistedUser($username, VtCommonEnum::NUMBER_ONE);
                        if ($getUserByUsername->is_active != VtCommonEnum::NUMBER_ONE) {
                            //User bi khoa
                            die('Tài khoản của bạn chưa được kích hoạt!');
                        }
                    } else {
                        die('Tài khoản hoặc mật khẩu không đúng!');
                    }
                } else {
                    die('Tài khoản chưa được đăng ký!');
                }
            }
        }
        $this->form = $form;
    }

    public function executeMenuTop(sfWebRequest $request)
    {

    }

    public function executeMenuTopGame(sfWebRequest $request)
    {

    }

    public function executeHomeFeature(sfWebRequest $request)
    {

    }

    public function executeRightHomeGameNew(sfWebRequest $request)
    {
        $this->listCaoThu = GUserTable::getListCaoThu();
        $this->listDaiGia = GUserTable::getListDaiGia();
        $this->listClan = ClanTable::getListTopClan();

    }

    public function executeListGame(sfWebRequest $request)
    {

    }


}

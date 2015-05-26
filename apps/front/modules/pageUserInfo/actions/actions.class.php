<?php

/**
 * pageHome actions.
 *
 * @package    VTP2.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageUserInfoActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        //
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
        //
        $this->getResponse()->setTitle(sfContext::getInstance()->getI18N()->__('Thông tin tài khoản'));
        //
        $i18n = sfContext::getInstance()->getI18N();
        $this->form = new VtUserInfoFormFront();
        $values =$request->getParameter($this->form->getName());
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());
        $this->user_details = $user_details;
        // Kiểm tra trùng email đã đăng ký
        if($request->isMethod('post')){
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {
                    try {
                        $user_details->setFullname(trim($values['fullname']));
                        $user_details->setBirth(trim($values['birth']));
                        $user_details->setEmail(trim($values['email']));
                        $user_details->setSex(trim($values['sex']));
                        $user_details->setIdentity(trim($values['identity']));
                        $user_details->setAddress(trim($values['address']));
                        $user_details->setMobile(trim($values['mobile']));
                        $user_details->save();
                        $this->getUser()->setFlash('success', $i18n->__("Cập nhật hồ sơ thành công!"));
                    }catch (Doctrine_Validator_Exception $e) {
                        $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!"));
                    }
            }else {
                $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!"));
            }
        }
    }

    //thông tin chi tiết user
    public function executeUserDetail(sfWebRequest $request){
//        $user = UserTable::getUserByUid($request->getParameter('user_id'));
//        if($user){
//            $this->redirect('@homepage');
//        }
        $g_user = GUserTable::getUserByUsername($request->getParameter('user_name'));
        if(!$g_user){
            $this->redirect('@homepage');
        }
        $this->user = UserTable::getUserByUsername($request->getParameter('user_name'));
        $this->g_user = $g_user;
        $this->history = '';
        if($this->user){
            $this->history = GameHistoryTable::getListHistoryById($this->user->getId());

        }
    }

    public function executeChangepwd(sfWebRequest $request){
        //
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
        //
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());
        $this->getResponse()->setTitle(sfContext::getInstance()->getI18N()->__('Thay đổi mật khẩu'));
        //
        $i18n = sfContext::getInstance()->getI18N();
        $this->form = new VtPublisherInfoFormChangePass();
        //
        if($request->isMethod('post')){
            $values=$request->getParameter($this->form->getName());
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {
                try {
                    $user_id  = sfContext::getInstance()->getUser()->getMemberId();
                    $user_details = VtPublisherInfoTable::findById($user_id);
                    $passwordGen = VtHelper::SHA1EncryptPassword('sha1', $user_details->getSalt(), $values['new_password']);
                    $user_details->setPassword($passwordGen);
                    $this->getUser()->setFlash('info', sfContext::getInstance()->getI18N()->__('Password successfully changed.'));
                    $user_details->save();
                    $this->getUser()->setFlash('success', $i18n->__("Bạn đã thay đổi mật khẩu thành công!"));
                }catch (Doctrine_Validator_Exception $e) {
                    $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!"));
                }
            }
            else{
                $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!"));
            }
        }
    }

    public function executeCash(sfWebRequest $request){
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());

        $this->getResponse()->setTitle(sfContext::getInstance()->getI18N()->__('Thông tin tài khoản'));
        //
        $i18n = sfContext::getInstance()->getI18N();
        $this->form = new VtUserInfoChargingForm();
        $values =$request->getParameter($this->form->getName());
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->user_details = $user_details;
        // Kiểm tra trùng email đã đăng ký
        if($request->isMethod('post')){
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

            if ($this->form->isValid()) {

                try {
                   if($values['cash_type'] == 'VG'){
                        $card = VtSerialCodeTable::checkSerialInput($values['epay_serial'], $values['epay_cardnumber'], 'VG');
                        if($card){
                            $money = $card->getChardAmount();
                        } else{
                            $this->getUser()->setFlash('success', $i18n->__("Thẻ cào không tồn tại!"));
                        }
                   }
                }catch (Doctrine_Validator_Exception $e) {
                    $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!"));
                }
            }else {
                $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!"));
            }
        }
    }
    public function executeAvatar(sfWebRequest $request){
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
    }
    public function executeFriends(sfWebRequest $request){
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->user_details = $user_details;
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());

        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
    }
    public function executeShop(sfWebRequest $request){
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());

        $this->user_details = $user_details;
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
    }
    public function executeTransaction(sfWebRequest $request){
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->user_details = $user_details;
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());

        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
    }

    public function executeInvite(sfWebRequest $request){
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->user_details = $user_details;
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());

        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
    }
    public function executeChangePass(sfWebRequest $request){
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
    }
    public function executeRecharging(sfWebRequest $request){
        //
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $this->redirect('@homepage');
        }
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->user_details = $user_details;
        $this->g_user = GUserTable::getUserByUsername($user_details->getUsername());

        //
        $this->mdl = $request->getParameter('module');
        $this->getResponse()->setTitle(sfContext::getInstance()->getI18N()->__('Nạp tiền vào tài khoản'));
        //
        $i18n = sfContext::getInstance()->getI18N();
        $this->form = new VtPublisherInfoRechargingForm();
        //
        $publisher_id = sfContext::getInstance()->getUser()->getMemberId();
        $this->money = VtPublisherInfoTable::getMoney($publisher_id);
        //
        if($request->isMethod('post')){
            $values=$request->getParameter($this->form->getName());
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {
                try {
                    $chard = new TopupCard();
                    $result = $chard->topupCard($values['seria'], $values['card_code']);
                    if($result == false){
                        $this->getUser()->setFlash('notice', $i18n->__("Giao dịch thất bại"));
                    }else{
                        if($result->errorCode == '00'){
                            $this->getUser()->setFlash('success', $i18n->__("Giao dịch thành công!"));
                            //Cập nhật money
                            $amount = isset($result->amount)?$result->amount:false;
                            if($amount){
                                $publisher = VtPublisherInfoTable::findById($publisher_id);
                                $publisher->setMoney($publisher->getMoney() + $amount);
                                $publisher->save();
                            }
                        } else{
                            $this->getUser()->setFlash('notice', $i18n->__("Giao dịch thất bại"));
                        }
                        VtLogAppPurchaseTable::writeLogs($result, $publisher_id);
                    }

                }catch (Doctrine_Validator_Exception $e) {
                    $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!" . $e->errorMessage()));
                }
            }else{
                $this->getUser()->setFlash('notice', $i18n->__("Form không hợp lệ!"));
            }
        }
    }

}

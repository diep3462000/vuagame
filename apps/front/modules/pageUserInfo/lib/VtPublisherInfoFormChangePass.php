<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageVtNotificationFormsAdmin
 *
 * @author diepth2
 */
class VtPublisherInfoFormChangePass extends BaseVtPublisherInfoForm
{
    //protected static  $gender = array('0' => 'Nam', '1' => 'Nữ');
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'password'      => new sfWidgetFormInputPassword(array(), array('class' => 'form-control vtt-100-percent' )),
            'new_password'      => new sfWidgetFormInputPassword(array(), array('class' => 'form-control vtt-100-percent' )),
            'repeat_password'     => new sfWidgetFormInputPassword(array(), array('class' => 'form-control vtt-100-percent' )),
            'captcha'       => new sfWidgetCaptchaGD(array(), array(
                'placeholder' => $i18n->__("Mã xác nhận"),
                    'class' => 'form-control vtt-100-percent')
            )

    ));
        $this->setValidators(array(
            'password'      => new sfValidatorString(array('max_length' => 32, 'min_length' => 6), array('required' => $i18n->__('Bắt buộc'))),
            'new_password'      => new sfValidatorString(array('max_length' => 32, 'min_length' => 8), array('required' => $i18n->__('Bắt buộc'))),
            'repeat_password'     => new sfValidatorString(array('max_length' => 32, 'min_length' => 8), array('required' => $i18n->__('Bắt buộc'))),
            'captcha'           => new sfCaptchaGDValidator(array('trim' => true), array(
                'invalid' => $i18n->__('Mã xác nhận không chính xác.'),
                'required' => $i18n->__('Yêu cầu mã xác nhận.'),
            )),
        ));
        //
//        $this->validatorSchema->setPostValidator(new validatorChangePassUser());
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkPassword'))));
        $this->mergePostValidator(new sfValidatorSchemaCompare('new_password', sfValidatorSchemaCompare::EQUAL, 'repeat_password', array(), array('invalid' => 'Mật khẩu không khớp.')));

        $this->mergePostValidator(new sfValidatorSchemaCompare('new_password', sfValidatorSchemaCompare::NOT_EQUAL, 'password', array(), array('invalid' => $i18n->__('Mật khẩu mới không được trùng mật khẩu cũ!'))));

        $this->widgetSchema->setNameFormat('password[%s]');
        //
    }
    public function checkPassword($validator, $values){
        $i18n = sfContext::getInstance()->getI18N();
        $arrayError = array();
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();

        $user_details = VtPublisherInfoTable::findById($user_id);
        if( $values['password'] && $user_details->getIsStatus() && !$user_details->checkPassword($values['password'])){
            $arrayError['password'] = new sfValidatorError($validator, $i18n->__('Mật khẩu cũ không đúng'));
            throw new sfValidatorErrorSchema($validator, $arrayError);
        }
        return $values;
    }

}

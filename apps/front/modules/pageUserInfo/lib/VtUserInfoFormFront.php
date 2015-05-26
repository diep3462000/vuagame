<?php

/**
 * VtpContact form.
 *
 * @package    Vt API
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VtUserInfoFormFront extends BaseUserForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $user_id  = sfContext::getInstance()->getUser()->getMemberId();
        $user_details = UserTable::findById($user_id);
        $this->setWidgets(array(
            'id'           => new sfWidgetFormInputHidden(),
            'fullname'       => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__('Nhập tên hiển thị...'))),
            'username'     => new sfWidgetFormInputHidden(),
            'email'        => new sfWidgetFormInputText(array(), array('class' => 'form-control' , 'placeholder' => $i18n->__('Nhập Email...'))),
            'mobile'        => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__('Nhập số điện thoại...') )),
            'identity'       => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__('Nhập CMT') )),
            'address'       => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__('Nhập địa chỉ....') )),
            'sex'       => new sfWidgetFormSelectRadio(
                array('choices' => array('1' => $i18n->__('Nam'), '0' => $i18n->__('Nữ')), 'default' => (int)($user_details->getSex()))),
            'avatar'         => new sfWidgetFormTextarea(),
            'birth'     => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__('Nhập năm sinh của bạn'))),

//            'birthday' =>new sfWidgetFormVnDatePicker(array(),array('readonly'=>false,'class'=>'datepicker', 'datetime_output'=>'d-m-Y', 'name'=>'date-idea')),

        ));

        $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD(array(), array(
            'placeholder' => $i18n->__("Mã xác nhận"),
             'class' => 'form-control',
        ));

        $this->setValidators(array(
            'id'                   => new sfValidatorChoice(array('choices' => array($user_details->username), 'empty_value' => $user_details->username, 'required' => false)),
            'fullname'       => new sfValidatorString(array('required' => false, 'max_length' => 100)),
            'username'     => new sfValidatorString(array('required' => false,'max_length' => 255), array('required' => $i18n->__('Bắt buộc'))),
            'identity'       => new sfValidatorString(array('required' => false,'max_length' => 50, 'required' => false)),
            'email'            => new sfValidatorEmail(array('required' => true, 'max_length' => 100, 'trim' => true),
                array(
                    'invalid' => $i18n->__('Email không hợp lệ.'),
                    'required' => $i18n->__('Email không được để trống.')
                )),
            //'phone'        => new sfValidatorString(array('max_length' => 20), array('required' => $i18n->__('Bắt buộc'))),
            'mobile'         => new sfValidatorAnd(array(
                new sfValidatorRegex(array('pattern' => '/^[0-9]{10,15}$/'), array('invalid' => $i18n->__('SĐT phải là số có độ dài từ 10-15 số!'))),
            )),
            'sex'       => new sfValidatorBoolean(array('required' => true), array('required' => $i18n->__('Bắt buộc'))),
            'address'      => new sfValidatorString(array('required' => false,'max_length' => 255)),
            'avatar'         => new sfValidatorString(array('required' => false,'max_length' => 1000, 'required' => false)),
            'captcha'           => new sfValidatorCaptchaGD(array('trim' => true, 'required' => false), array(
                'invalid' => $i18n->__('Mã xác nhận không chính xác.'),
                'required' => $i18n->__('Yêu cầu mã xác nhận.'),
            )),
            'birth'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),



        ));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));


        $this->widgetSchema->setNameFormat('user_register[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
        //Setdefault thong tin user dang nhap gui lien he
//        if($user_details){
            $this->widgetSchema['fullname']->setDefault($user_details->fullname);
            $this->widgetSchema['address']->setDefault($user_details->address);
            $this->widgetSchema['email']->setDefault($user_details->email);
            $this->widgetSchema['mobile']->setDefault(intval($user_details->mobile));
            $this->widgetSchema['identity']->setDefault($user_details->identity);
            $this->widgetSchema['birth']->setDefault($user_details->birth);
//        }


    }


    public function checkValidator($validator, $values){
        //
        $i18n = sfContext::getInstance()->getI18N();
        //$pattern = '/^.*(admin).*/';
        if($values['email'] && UserTable::checkEmailExisted($values['email'], $values['id'])){
            $error1 = new sfValidatorError($validator,$i18n->__('Email đã tồn tại'));
            throw new sfValidatorErrorSchema($validator, array('email' => $error1));
        }
        // MST ko bắt buộc nhập, nhưng nếu nhập phải đúng
//        if($values['taxcode'] != ""){
//            $pattern_taxcode = '/^[0-9]{10,13}$/';
//            if(!preg_match($pattern_taxcode, $values['taxcode'])){
//                $error_taxcode = new sfValidatorError($validator, $i18n->__('MST phải là số có độ dài 10-13 ký tự!'));
//                throw new sfValidatorErrorSchema($validator, array('taxcode' => $error_taxcode));
//            }
//        }
        return $values;
    }
}

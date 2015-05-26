<?php

/**
 * VtpContact form.
 *
 * @package    Vt API
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VtUserInfoChargingForm extends BaseUserForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_cash = array_merge(array('' => $i18n->__("===Lựa chọn thẻ===")), Attributes::getAttributesList('cash_type'));
        $this->setWidgets(array(
            'cash_type'    => new sfWidgetFormChoice(array('choices' => $arr_cash), array('add_empty' => true), array('class' => 'validate[required]', 'id' => "epay_cp")),
            'epay_serial'        => new sfWidgetFormInputText(array(), array('class' => 'validate[required]' , 'placeholder' => $i18n->__('Nhập phần không cào...'))),
            'epay_cardnumber'        => new sfWidgetFormInputText(array(), array('class' => 'validate[required]' , 'placeholder' => $i18n->__('Nhập phần cào trên thẻ...'))),

//            'birthday' =>new sfWidgetFormVnDatePicker(array(),array('readonly'=>false,'class'=>'datepicker', 'datetime_output'=>'d-m-Y', 'name'=>'date-idea')),

        ));

        $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD(array(), array(
            'placeholder' => $i18n->__("Mã xác nhận"),
            'class' => 'form-control',
        ));

        $this->setValidators(array(
            'cash_type'    => new sfValidatorChoice(array('choices' => array_keys($arr_cash))),
            'epay_serial'          => new sfValidatorString(array('max_length' => 50, 'required' => true)),
            'epay_cardnumber'          => new sfValidatorString(array('max_length' => 50, 'required' => true)),



        ));

        $this->widgetSchema->setNameFormat('user_register[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);


    }
}

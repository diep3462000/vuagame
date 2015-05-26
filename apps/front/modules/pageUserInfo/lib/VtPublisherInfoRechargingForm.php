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
class VtPublisherInfoRechargingForm extends BaseForm
{
    //protected static  $gender = array('0' => 'Nam', '1' => 'Nữ');
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'seria'         => new sfWidgetFormInput(array(), array('class' => 'form-control' )),
            'card_code'     => new sfWidgetFormInput(array(), array('class' => 'form-control' )),
            'captcha'       => new sfWidgetCaptchaGD(array(), array(
            'placeholder'   => $i18n->__("Mã xác nhận"),
            'class'         => 'form-control vtt-100-percent')
            )

        ));
        $this->setValidators(array(
            'seria'         => new sfValidatorString(array('max_length' => 32, 'min_length' => 6), array('required' => $i18n->__('Bắt buộc'))),
            'card_code'     => new sfValidatorString(array('max_length' => 32, 'min_length' => 8), array('required' => $i18n->__('Bắt buộc'))),
            'captcha'       => new sfCaptchaGDValidator(array('trim' => true), array(
            'invalid'       => $i18n->__('Mã xác nhận không chính xác.'),
            'required'      => $i18n->__('Yêu cầu mã xác nhận.'),
            )),
        ));
//        $this->validatorSchema->setPostValidator(new validatorChangePassUser());


        $this->widgetSchema->setNameFormat('charging[%s]');
        //
    }

}

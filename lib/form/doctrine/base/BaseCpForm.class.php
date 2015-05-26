<?php

/**
 * Cp form base class.
 *
 * @method Cp getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_id'                => new sfWidgetFormInputHidden(),
      'cp_name'              => new sfWidgetFormInputText(),
      'vm_name'              => new sfWidgetFormInputText(),
      'shortcode_sms1'       => new sfWidgetFormInputText(),
      'shortcode_sms2'       => new sfWidgetFormInputText(),
      'shortcode_active_sms' => new sfWidgetFormInputText(),
      'keyword'              => new sfWidgetFormInputText(),
      'keyword_active'       => new sfWidgetFormInputText(),
      'enable_sms'           => new sfWidgetFormInputText(),
      'enable_active_sms'    => new sfWidgetFormInputText(),
      'password_charging'    => new sfWidgetFormInputText(),
      'enable_ios_chaging'   => new sfWidgetFormInputText(),
      'link_android'         => new sfWidgetFormInputText(),
      'link_ios'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cp_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_id')), 'empty_value' => $this->getObject()->get('cp_id'), 'required' => false)),
      'cp_name'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'vm_name'              => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'shortcode_sms1'       => new sfValidatorInteger(array('required' => false)),
      'shortcode_sms2'       => new sfValidatorInteger(array('required' => false)),
      'shortcode_active_sms' => new sfValidatorInteger(array('required' => false)),
      'keyword'              => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'keyword_active'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'enable_sms'           => new sfValidatorInteger(array('required' => false)),
      'enable_active_sms'    => new sfValidatorInteger(array('required' => false)),
      'password_charging'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'enable_ios_chaging'   => new sfValidatorInteger(array('required' => false)),
      'link_android'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'link_ios'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cp';
  }

}

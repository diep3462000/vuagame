<?php

/**
 * SmsLog form base class.
 *
 * @method SmsLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSmsLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'send_number' => new sfWidgetFormInputText(),
      'shortcode'   => new sfWidgetFormInputText(),
      'mobody'      => new sfWidgetFormInputText(),
      'mtbody'      => new sfWidgetFormInputText(),
      'cp_id'       => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
      'datecreated' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'send_number' => new sfValidatorString(array('max_length' => 12)),
      'shortcode'   => new sfValidatorString(array('max_length' => 12)),
      'mobody'      => new sfValidatorString(array('max_length' => 20)),
      'mtbody'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_id'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'status'      => new sfValidatorInteger(array('required' => false)),
      'datecreated' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sms_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SmsLog';
  }

}

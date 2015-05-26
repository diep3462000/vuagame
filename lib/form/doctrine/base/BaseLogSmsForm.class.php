<?php

/**
 * LogSms form base class.
 *
 * @method LogSms getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLogSmsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'sender'      => new sfWidgetFormInputText(),
      'recipient'   => new sfWidgetFormInputText(),
      'mobody'      => new sfWidgetFormInputText(),
      'mtbody'      => new sfWidgetFormInputText(),
      'cpid'        => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
      'datecreated' => new sfWidgetFormDateTime(),
      'sendnumber'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sender'      => new sfValidatorString(array('max_length' => 12)),
      'recipient'   => new sfValidatorString(array('max_length' => 12)),
      'mobody'      => new sfValidatorString(array('max_length' => 20)),
      'mtbody'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cpid'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'status'      => new sfValidatorInteger(array('required' => false)),
      'datecreated' => new sfValidatorDateTime(),
      'sendnumber'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_sms[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogSms';
  }

}

<?php

/**
 * CardLog form base class.
 *
 * @method CardLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCardLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'user_id' => new sfWidgetFormInputText(),
      'code'    => new sfWidgetFormInputText(),
      'time'    => new sfWidgetFormDateTime(),
      'status'  => new sfWidgetFormTextarea(),
      'success' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id' => new sfValidatorInteger(array('required' => false)),
      'code'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'time'    => new sfValidatorDateTime(),
      'status'  => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'success' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('card_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CardLog';
  }

}

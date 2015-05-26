<?php

/**
 * ConfigCard form base class.
 *
 * @method ConfigCard getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConfigCardForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'system'      => new sfWidgetFormInputText(),
      'cp'          => new sfWidgetFormInputText(),
      'system_card' => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'system'      => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'cp'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'system_card' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'status'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('config_card[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigCard';
  }

}

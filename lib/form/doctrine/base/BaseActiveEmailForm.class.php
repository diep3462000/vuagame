<?php

/**
 * ActiveEmail form base class.
 *
 * @method ActiveEmail getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActiveEmailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'email'       => new sfWidgetFormInputText(),
      'user_id'     => new sfWidgetFormInputText(),
      'activecode'  => new sfWidgetFormInputText(),
      'createddate' => new sfWidgetFormDateTime(),
      'expireddate' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'     => new sfValidatorInteger(array('required' => false)),
      'activecode'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'createddate' => new sfValidatorDateTime(array('required' => false)),
      'expireddate' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('active_email[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActiveEmail';
  }

}

<?php

/**
 * Friend form base class.
 *
 * @method Friend getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFriendForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'user1_id' => new sfWidgetFormInputText(),
      'user2_id' => new sfWidgetFormInputText(),
      'datetime' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user1_id' => new sfValidatorInteger(),
      'user2_id' => new sfValidatorInteger(),
      'datetime' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('friend[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Friend';
  }

}

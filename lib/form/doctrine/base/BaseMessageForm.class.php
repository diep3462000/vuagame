<?php

/**
 * Message form base class.
 *
 * @method Message getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'parent_id'    => new sfWidgetFormInputText(),
      'from_user_id' => new sfWidgetFormInputText(),
      'isnewcomment' => new sfWidgetFormInputText(),
      'type_id'      => new sfWidgetFormInputText(),
      'comment'      => new sfWidgetFormTextarea(),
      'datetime'     => new sfWidgetFormDateTime(),
      'cp'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'parent_id'    => new sfValidatorInteger(array('required' => false)),
      'from_user_id' => new sfValidatorInteger(),
      'isnewcomment' => new sfValidatorInteger(array('required' => false)),
      'type_id'      => new sfValidatorInteger(),
      'comment'      => new sfValidatorString(array('max_length' => 500)),
      'datetime'     => new sfValidatorDateTime(),
      'cp'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Message';
  }

}

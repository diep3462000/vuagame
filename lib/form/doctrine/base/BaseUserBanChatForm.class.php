<?php

/**
 * UserBanChat form base class.
 *
 * @method UserBanChat getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserBanChatForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'userid'      => new sfWidgetFormInputText(),
      'datecreated' => new sfWidgetFormDateTime(),
      'detail'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'userid'      => new sfValidatorInteger(array('required' => false)),
      'datecreated' => new sfValidatorDateTime(array('required' => false)),
      'detail'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_ban_chat[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserBanChat';
  }

}

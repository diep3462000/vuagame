<?php

/**
 * ViewUserInfo form base class.
 *
 * @method ViewUserInfo getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseViewUserInfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormInputText(),
      'username'         => new sfWidgetFormInputText(),
      'fullname'         => new sfWidgetFormInputText(),
      'password'         => new sfWidgetFormInputText(),
      'activated'        => new sfWidgetFormInputText(),
      'avatar_id'        => new sfWidgetFormInputText(),
      'level_id'         => new sfWidgetFormInputText(),
      'coin'             => new sfWidgetFormInputText(),
      'total_match_play' => new sfWidgetFormInputText(),
      'last_login'       => new sfWidgetFormDateTime(),
      'experience'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorInteger(array('required' => false)),
      'username'         => new sfValidatorString(array('max_length' => 20)),
      'fullname'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'password'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'activated'        => new sfValidatorInteger(array('required' => false)),
      'avatar_id'        => new sfValidatorInteger(array('required' => false)),
      'level_id'         => new sfValidatorInteger(array('required' => false)),
      'coin'             => new sfValidatorNumber(array('required' => false)),
      'total_match_play' => new sfValidatorInteger(array('required' => false)),
      'last_login'       => new sfValidatorDateTime(array('required' => false)),
      'experience'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('view_user_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ViewUserInfo';
  }

}

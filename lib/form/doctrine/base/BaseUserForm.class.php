<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'username'       => new sfWidgetFormInputText(),
      'password'       => new sfWidgetFormInputText(),
      'fullname'       => new sfWidgetFormInputText(),
      'identity'       => new sfWidgetFormInputText(),
      'address'        => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'mobile'         => new sfWidgetFormInputText(),
      'birth'          => new sfWidgetFormInputText(),
      'sex'            => new sfWidgetFormInputText(),
      'register_date'  => new sfWidgetFormDateTime(),
      'age'            => new sfWidgetFormInputText(),
      'cash'           => new sfWidgetFormInputText(),
      'is_active'      => new sfWidgetFormInputText(),
      'totalgame'      => new sfWidgetFormInputText(),
      'clanid'         => new sfWidgetFormInputText(),
      'roleid'         => new sfWidgetFormInputText(),
      'avatar'         => new sfWidgetFormTextarea(),
      'refid'          => new sfWidgetFormInputText(),
      'hits'           => new sfWidgetFormInputText(),
      'activecode'     => new sfWidgetFormInputText(),
      'is_partner'     => new sfWidgetFormInputText(),
      'algorithm'      => new sfWidgetFormInputText(),
      'salt'           => new sfWidgetFormInputText(),
      'last_login'     => new sfWidgetFormDateTime(),
      'pass_update_at' => new sfWidgetFormDateTime(),
      'is_lock_signin' => new sfWidgetFormInputCheckbox(),
      'locked_time'    => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 50)),
      'password'       => new sfValidatorString(array('max_length' => 100)),
      'fullname'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'identity'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'address'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mobile'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'birth'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'sex'            => new sfValidatorInteger(array('required' => false)),
      'register_date'  => new sfValidatorDateTime(),
      'age'            => new sfValidatorInteger(array('required' => false)),
      'cash'           => new sfValidatorNumber(array('required' => false)),
      'is_active'      => new sfValidatorInteger(array('required' => false)),
      'totalgame'      => new sfValidatorInteger(array('required' => false)),
      'clanid'         => new sfValidatorInteger(array('required' => false)),
      'roleid'         => new sfValidatorInteger(array('required' => false)),
      'avatar'         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'refid'          => new sfValidatorInteger(array('required' => false)),
      'hits'           => new sfValidatorInteger(array('required' => false)),
      'activecode'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_partner'     => new sfValidatorInteger(array('required' => false)),
      'algorithm'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'salt'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_login'     => new sfValidatorDateTime(array('required' => false)),
      'pass_update_at' => new sfValidatorDateTime(array('required' => false)),
      'is_lock_signin' => new sfValidatorBoolean(array('required' => false)),
      'locked_time'    => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}

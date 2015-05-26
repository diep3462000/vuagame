<?php

/**
 * User filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fullname'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'identity'       => new sfWidgetFormFilterInput(),
      'address'        => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(),
      'mobile'         => new sfWidgetFormFilterInput(),
      'birth'          => new sfWidgetFormFilterInput(),
      'sex'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'register_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'age'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cash'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalgame'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clanid'         => new sfWidgetFormFilterInput(),
      'roleid'         => new sfWidgetFormFilterInput(),
      'avatar'         => new sfWidgetFormFilterInput(),
      'refid'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hits'           => new sfWidgetFormFilterInput(),
      'activecode'     => new sfWidgetFormFilterInput(),
      'is_partner'     => new sfWidgetFormFilterInput(),
      'algorithm'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'salt'           => new sfWidgetFormFilterInput(),
      'last_login'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pass_update_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_lock_signin' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'locked_time'    => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'       => new sfValidatorPass(array('required' => false)),
      'password'       => new sfValidatorPass(array('required' => false)),
      'fullname'       => new sfValidatorPass(array('required' => false)),
      'identity'       => new sfValidatorPass(array('required' => false)),
      'address'        => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'mobile'         => new sfValidatorPass(array('required' => false)),
      'birth'          => new sfValidatorPass(array('required' => false)),
      'sex'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'register_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'age'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cash'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_active'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalgame'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'clanid'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'roleid'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatar'         => new sfValidatorPass(array('required' => false)),
      'refid'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hits'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'activecode'     => new sfValidatorPass(array('required' => false)),
      'is_partner'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'algorithm'      => new sfValidatorPass(array('required' => false)),
      'salt'           => new sfValidatorPass(array('required' => false)),
      'last_login'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'pass_update_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_lock_signin' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'locked_time'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'username'       => 'Text',
      'password'       => 'Text',
      'fullname'       => 'Text',
      'identity'       => 'Text',
      'address'        => 'Text',
      'email'          => 'Text',
      'mobile'         => 'Text',
      'birth'          => 'Text',
      'sex'            => 'Number',
      'register_date'  => 'Date',
      'age'            => 'Number',
      'cash'           => 'Number',
      'is_active'      => 'Number',
      'totalgame'      => 'Number',
      'clanid'         => 'Number',
      'roleid'         => 'Number',
      'avatar'         => 'Text',
      'refid'          => 'Number',
      'hits'           => 'Number',
      'activecode'     => 'Text',
      'is_partner'     => 'Number',
      'algorithm'      => 'Text',
      'salt'           => 'Text',
      'last_login'     => 'Date',
      'pass_update_at' => 'Date',
      'is_lock_signin' => 'Boolean',
      'locked_time'    => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}

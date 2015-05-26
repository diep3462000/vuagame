<?php

/**
 * ViewUserInfo filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseViewUserInfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fullname'         => new sfWidgetFormFilterInput(),
      'password'         => new sfWidgetFormFilterInput(),
      'activated'        => new sfWidgetFormFilterInput(),
      'avatar_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'level_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coin'             => new sfWidgetFormFilterInput(),
      'total_match_play' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_login'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'experience'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'         => new sfValidatorPass(array('required' => false)),
      'fullname'         => new sfValidatorPass(array('required' => false)),
      'password'         => new sfValidatorPass(array('required' => false)),
      'activated'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatar_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'coin'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_match_play' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'last_login'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'experience'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('view_user_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ViewUserInfo';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'user_id'          => 'Number',
      'username'         => 'Text',
      'fullname'         => 'Text',
      'password'         => 'Text',
      'activated'        => 'Number',
      'avatar_id'        => 'Number',
      'level_id'         => 'Number',
      'coin'             => 'Number',
      'total_match_play' => 'Number',
      'last_login'       => 'Date',
      'experience'       => 'Number',
    );
  }
}

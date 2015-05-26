<?php

/**
 * Friend filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFriendFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user1_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user2_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datetime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user1_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user2_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'datetime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('friend_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Friend';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'user1_id' => 'Number',
      'user2_id' => 'Number',
      'datetime' => 'Date',
    );
  }
}

<?php

/**
 * Clanmember filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClanmemberFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'joindate'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'role'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'applystatus' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clanpoint'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clandonate'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clanid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'joindate'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'role'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'applystatus' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'clanpoint'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'clandonate'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'clanid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('clanmember_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanmember';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'Number',
      'joindate'    => 'Date',
      'role'        => 'Number',
      'applystatus' => 'Number',
      'clanpoint'   => 'Number',
      'clandonate'  => 'Number',
      'clanid'      => 'Number',
    );
  }
}

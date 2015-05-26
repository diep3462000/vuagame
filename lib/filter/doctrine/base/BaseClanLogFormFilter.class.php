<?php

/**
 * ClanLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClanLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'level'       => new sfWidgetFormFilterInput(),
      'money'       => new sfWidgetFormFilterInput(),
      'ownerid'     => new sfWidgetFormFilterInput(),
      'totalmember' => new sfWidgetFormFilterInput(),
      'deletedate'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'level'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'money'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ownerid'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalmember' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deletedate'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('clan_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClanLog';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'level'       => 'Number',
      'money'       => 'Number',
      'ownerid'     => 'Number',
      'totalmember' => 'Number',
      'deletedate'  => 'Date',
    );
  }
}

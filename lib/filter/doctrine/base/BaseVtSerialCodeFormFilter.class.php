<?php

/**
 * VtSerialCode filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVtSerialCodeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'serial'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cardnumber' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'charg_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtChargAmount'), 'add_empty' => true)),
      'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_status'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'end_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'dai_ly_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtDaiLy'), 'add_empty' => true)),
      'admin_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'serial'     => new sfValidatorPass(array('required' => false)),
      'cardnumber' => new sfValidatorPass(array('required' => false)),
      'user_id'    => new sfValidatorPass(array('required' => false)),
      'charg_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VtChargAmount'), 'column' => 'id')),
      'type'       => new sfValidatorPass(array('required' => false)),
      'is_status'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'end_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'dai_ly_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VtDaiLy'), 'column' => 'id')),
      'admin_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SfGuardUser'), 'column' => 'id')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('vt_serial_code_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtSerialCode';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'serial'     => 'Text',
      'cardnumber' => 'Text',
      'user_id'    => 'Text',
      'charg_id'   => 'ForeignKey',
      'type'       => 'Text',
      'is_status'  => 'Boolean',
      'end_date'   => 'Date',
      'dai_ly_id'  => 'ForeignKey',
      'admin_id'   => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}

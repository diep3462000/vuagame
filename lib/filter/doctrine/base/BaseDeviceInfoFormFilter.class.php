<?php

/**
 * DeviceInfo filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDeviceInfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'unique_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'device_series' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'os'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'time'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'unique_id'     => new sfValidatorPass(array('required' => false)),
      'device_series' => new sfValidatorPass(array('required' => false)),
      'os'            => new sfValidatorPass(array('required' => false)),
      'cp_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('device_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DeviceInfo';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'unique_id'     => 'Text',
      'device_series' => 'Text',
      'os'            => 'Text',
      'cp_id'         => 'Number',
      'time'          => 'Date',
    );
  }
}

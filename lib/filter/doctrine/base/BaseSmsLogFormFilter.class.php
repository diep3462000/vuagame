<?php

/**
 * SmsLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSmsLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'send_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'shortcode'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mobody'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mtbody'      => new sfWidgetFormFilterInput(),
      'cp_id'       => new sfWidgetFormFilterInput(),
      'status'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datecreated' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'send_number' => new sfValidatorPass(array('required' => false)),
      'shortcode'   => new sfValidatorPass(array('required' => false)),
      'mobody'      => new sfValidatorPass(array('required' => false)),
      'mtbody'      => new sfValidatorPass(array('required' => false)),
      'cp_id'       => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'datecreated' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sms_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SmsLog';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'send_number' => 'Text',
      'shortcode'   => 'Text',
      'mobody'      => 'Text',
      'mtbody'      => 'Text',
      'cp_id'       => 'Text',
      'status'      => 'Number',
      'datecreated' => 'Date',
    );
  }
}

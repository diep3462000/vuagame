<?php

/**
 * CardLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCardLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id' => new sfWidgetFormFilterInput(),
      'code'    => new sfWidgetFormFilterInput(),
      'time'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'status'  => new sfWidgetFormFilterInput(),
      'success' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code'    => new sfValidatorPass(array('required' => false)),
      'time'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'status'  => new sfValidatorPass(array('required' => false)),
      'success' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('card_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CardLog';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'user_id' => 'Number',
      'code'    => 'Text',
      'time'    => 'Date',
      'status'  => 'Text',
      'success' => 'Number',
    );
  }
}

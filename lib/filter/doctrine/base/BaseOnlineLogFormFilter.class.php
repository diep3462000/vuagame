<?php

/**
 * OnlineLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOnlineLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'peak'   => new sfWidgetFormFilterInput(),
      'time'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'dateup' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'peak'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'dateup' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('online_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OnlineLog';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'peak'   => 'Number',
      'time'   => 'Date',
      'dateup' => 'Text',
    );
  }
}

<?php

/**
 * History filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHistoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cash'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'current_cash' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'game_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_type'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'time'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'money'        => new sfWidgetFormFilterInput(),
      'cp'           => new sfWidgetFormFilterInput(),
      'title'        => new sfWidgetFormFilterInput(),
      'isxu'         => new sfWidgetFormFilterInput(),
      'cardtype'     => new sfWidgetFormFilterInput(),
      'short_code'   => new sfWidgetFormFilterInput(),
      'status'       => new sfWidgetFormFilterInput(),
      'telco'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cash'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'current_cash' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'  => new sfValidatorPass(array('required' => false)),
      'game_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trans_type'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'money'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp'           => new sfValidatorPass(array('required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'isxu'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cardtype'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'short_code'   => new sfValidatorPass(array('required' => false)),
      'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'telco'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('history_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'History';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'user_id'      => 'Number',
      'cash'         => 'Number',
      'current_cash' => 'Number',
      'description'  => 'Text',
      'game_id'      => 'Number',
      'trans_type'   => 'Number',
      'time'         => 'Date',
      'money'        => 'Number',
      'cp'           => 'Text',
      'title'        => 'Text',
      'isxu'         => 'Number',
      'cardtype'     => 'Number',
      'short_code'   => 'Text',
      'status'       => 'Number',
      'telco'        => 'Text',
    );
  }
}

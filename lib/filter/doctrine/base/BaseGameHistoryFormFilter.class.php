<?php

/**
 * GameHistory filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGameHistoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'money_trans'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'current_money' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'game_id'       => new sfWidgetFormFilterInput(),
      'trans_type'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'time'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'money_trans'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'current_money' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'   => new sfValidatorPass(array('required' => false)),
      'game_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trans_type'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('game_history_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GameHistory';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_id'       => 'Number',
      'money_trans'   => 'Number',
      'current_money' => 'Number',
      'description'   => 'Text',
      'game_id'       => 'Number',
      'trans_type'    => 'Number',
      'time'          => 'Date',
    );
  }
}

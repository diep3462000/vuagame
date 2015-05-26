<?php

/**
 * GUser filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'avatar_id'          => new sfWidgetFormFilterInput(),
      'level_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Level'), 'add_empty' => true)),
      'isOnline'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'isMobile'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ip'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'device'             => new sfWidgetFormFilterInput(),
      'screen'             => new sfWidgetFormFilterInput(),
      'currentGame'        => new sfWidgetFormFilterInput(),
      'exp'                => new sfWidgetFormFilterInput(),
      'avatar'             => new sfWidgetFormFilterInput(),
      'gameCash'           => new sfWidgetFormFilterInput(),
      'username'           => new sfWidgetFormFilterInput(),
      'totalGame'          => new sfWidgetFormFilterInput(),
      'totalWin'           => new sfWidgetFormFilterInput(),
      'playing_game'       => new sfWidgetFormFilterInput(),
      'is_block'           => new sfWidgetFormFilterInput(),
      'start_playing_time' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp'                 => new sfWidgetFormFilterInput(),
      'gift_times'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'avatar_id'          => new sfValidatorPass(array('required' => false)),
      'level_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Level'), 'column' => 'id')),
      'isOnline'           => new sfValidatorPass(array('required' => false)),
      'isMobile'           => new sfValidatorPass(array('required' => false)),
      'ip'                 => new sfValidatorPass(array('required' => false)),
      'device'             => new sfValidatorPass(array('required' => false)),
      'screen'             => new sfValidatorPass(array('required' => false)),
      'currentGame'        => new sfValidatorPass(array('required' => false)),
      'exp'                => new sfValidatorPass(array('required' => false)),
      'avatar'             => new sfValidatorPass(array('required' => false)),
      'gameCash'           => new sfValidatorPass(array('required' => false)),
      'username'           => new sfValidatorPass(array('required' => false)),
      'totalGame'          => new sfValidatorPass(array('required' => false)),
      'totalWin'           => new sfValidatorPass(array('required' => false)),
      'playing_game'       => new sfValidatorPass(array('required' => false)),
      'is_block'           => new sfValidatorPass(array('required' => false)),
      'start_playing_time' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp'                 => new sfValidatorPass(array('required' => false)),
      'gift_times'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('g_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GUser';
  }

  public function getFields()
  {
    return array(
      'user_id'            => 'Text',
      'avatar_id'          => 'Text',
      'level_id'           => 'ForeignKey',
      'isOnline'           => 'Text',
      'isMobile'           => 'Text',
      'ip'                 => 'Text',
      'device'             => 'Text',
      'screen'             => 'Text',
      'currentGame'        => 'Text',
      'exp'                => 'Text',
      'avatar'             => 'Text',
      'gameCash'           => 'Text',
      'username'           => 'Text',
      'totalGame'          => 'Text',
      'totalWin'           => 'Text',
      'playing_game'       => 'Text',
      'is_block'           => 'Text',
      'start_playing_time' => 'Date',
      'cp'                 => 'Text',
      'gift_times'         => 'Text',
    );
  }
}

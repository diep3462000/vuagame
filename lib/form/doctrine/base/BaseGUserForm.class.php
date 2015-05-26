<?php

/**
 * GUser form base class.
 *
 * @method GUser getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'            => new sfWidgetFormInputHidden(),
      'avatar_id'          => new sfWidgetFormInputText(),
      'level_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Level'), 'add_empty' => false)),
      'isOnline'           => new sfWidgetFormInputText(),
      'isMobile'           => new sfWidgetFormInputText(),
      'ip'                 => new sfWidgetFormInputText(),
      'device'             => new sfWidgetFormInputText(),
      'screen'             => new sfWidgetFormInputText(),
      'currentGame'        => new sfWidgetFormInputText(),
      'exp'                => new sfWidgetFormInputText(),
      'avatar'             => new sfWidgetFormInputText(),
      'gameCash'           => new sfWidgetFormInputText(),
      'username'           => new sfWidgetFormInputText(),
      'totalGame'          => new sfWidgetFormInputText(),
      'totalWin'           => new sfWidgetFormInputText(),
      'playing_game'       => new sfWidgetFormInputText(),
      'is_block'           => new sfWidgetFormInputText(),
      'start_playing_time' => new sfWidgetFormDateTime(),
      'cp'                 => new sfWidgetFormInputText(),
      'gift_times'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'user_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_id')), 'empty_value' => $this->getObject()->get('user_id'), 'required' => false)),
      'avatar_id'          => new sfValidatorPass(array('required' => false)),
      'level_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Level'), 'required' => false)),
      'isOnline'           => new sfValidatorPass(array('required' => false)),
      'isMobile'           => new sfValidatorPass(array('required' => false)),
      'ip'                 => new sfValidatorString(array('max_length' => 30)),
      'device'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'screen'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'currentGame'        => new sfValidatorPass(array('required' => false)),
      'exp'                => new sfValidatorPass(array('required' => false)),
      'avatar'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'gameCash'           => new sfValidatorPass(array('required' => false)),
      'username'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'totalGame'          => new sfValidatorPass(array('required' => false)),
      'totalWin'           => new sfValidatorPass(array('required' => false)),
      'playing_game'       => new sfValidatorPass(array('required' => false)),
      'is_block'           => new sfValidatorPass(array('required' => false)),
      'start_playing_time' => new sfValidatorDateTime(array('required' => false)),
      'cp'                 => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'gift_times'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'GUser', 'column' => array('user_id')))
    );

    $this->widgetSchema->setNameFormat('g_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GUser';
  }

}

<?php

/**
 * GameHistory form base class.
 *
 * @method GameHistory getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGameHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormInputText(),
      'money_trans'   => new sfWidgetFormInputText(),
      'current_money' => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'game_id'       => new sfWidgetFormInputText(),
      'trans_type'    => new sfWidgetFormInputText(),
      'time'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'       => new sfValidatorInteger(),
      'money_trans'   => new sfValidatorNumber(),
      'current_money' => new sfValidatorNumber(),
      'description'   => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'game_id'       => new sfValidatorInteger(array('required' => false)),
      'trans_type'    => new sfValidatorInteger(array('required' => false)),
      'time'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('game_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GameHistory';
  }

}

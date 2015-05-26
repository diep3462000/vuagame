<?php

/**
 * History form base class.
 *
 * @method History getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormInputText(),
      'cash'         => new sfWidgetFormInputText(),
      'current_cash' => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'game_id'      => new sfWidgetFormInputText(),
      'trans_type'   => new sfWidgetFormInputText(),
      'time'         => new sfWidgetFormDateTime(),
      'money'        => new sfWidgetFormInputText(),
      'cp'           => new sfWidgetFormTextarea(),
      'title'        => new sfWidgetFormTextarea(),
      'isxu'         => new sfWidgetFormInputText(),
      'cardtype'     => new sfWidgetFormInputText(),
      'short_code'   => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputText(),
      'telco'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'      => new sfValidatorInteger(),
      'cash'         => new sfValidatorInteger(),
      'current_cash' => new sfValidatorNumber(),
      'description'  => new sfValidatorString(array('max_length' => 6000, 'required' => false)),
      'game_id'      => new sfValidatorInteger(array('required' => false)),
      'trans_type'   => new sfValidatorInteger(array('required' => false)),
      'time'         => new sfValidatorDateTime(array('required' => false)),
      'money'        => new sfValidatorInteger(array('required' => false)),
      'cp'           => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'isxu'         => new sfValidatorInteger(array('required' => false)),
      'cardtype'     => new sfValidatorInteger(array('required' => false)),
      'short_code'   => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'status'       => new sfValidatorInteger(array('required' => false)),
      'telco'        => new sfValidatorString(array('max_length' => 5, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'History';
  }

}

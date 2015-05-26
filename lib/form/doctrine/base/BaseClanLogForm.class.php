<?php

/**
 * ClanLog form base class.
 *
 * @method ClanLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClanLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'level'       => new sfWidgetFormInputText(),
      'money'       => new sfWidgetFormInputText(),
      'ownerid'     => new sfWidgetFormInputText(),
      'totalmember' => new sfWidgetFormInputText(),
      'deletedate'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'level'       => new sfValidatorInteger(array('required' => false)),
      'money'       => new sfValidatorInteger(array('required' => false)),
      'ownerid'     => new sfValidatorInteger(array('required' => false)),
      'totalmember' => new sfValidatorInteger(array('required' => false)),
      'deletedate'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('clan_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClanLog';
  }

}

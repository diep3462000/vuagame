<?php

/**
 * Clanupgrade form base class.
 *
 * @method Clanupgrade getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClanupgradeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'level'     => new sfWidgetFormInputText(),
      'money'     => new sfWidgetFormInputText(),
      'totalslot' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'level'     => new sfValidatorInteger(array('required' => false)),
      'money'     => new sfValidatorInteger(array('required' => false)),
      'totalslot' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('clanupgrade[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanupgrade';
  }

}

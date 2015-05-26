<?php

/**
 * Clanwall form base class.
 *
 * @method Clanwall getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClanwallForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'clanid'   => new sfWidgetFormInputText(),
      'userid'   => new sfWidgetFormInputText(),
      'message'  => new sfWidgetFormInputText(),
      'postdate' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'clanid'   => new sfValidatorInteger(array('required' => false)),
      'userid'   => new sfValidatorInteger(),
      'message'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'postdate' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('clanwall[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanwall';
  }

}

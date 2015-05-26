<?php

/**
 * Openid form base class.
 *
 * @method Openid getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOpenidForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'userid'      => new sfWidgetFormInputText(),
      'openid'      => new sfWidgetFormInputText(),
      'chanel'      => new sfWidgetFormInputText(),
      'datecreated' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'userid'      => new sfValidatorInteger(),
      'openid'      => new sfValidatorString(array('max_length' => 100)),
      'chanel'      => new sfValidatorInteger(array('required' => false)),
      'datecreated' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('openid[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Openid';
  }

}

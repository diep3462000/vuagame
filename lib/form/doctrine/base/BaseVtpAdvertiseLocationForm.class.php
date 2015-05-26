<?php

/**
 * VtpAdvertiseLocation form base class.
 *
 * @method VtpAdvertiseLocation getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtpAdvertiseLocationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'page'         => new sfWidgetFormInputText(),
      'template'     => new sfWidgetFormInputText(),
      'advertise_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtpAdvertiseLocation'), 'add_empty' => true)),
      'priority'     => new sfWidgetFormInputText(),
      'portal_id'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 200)),
      'page'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'template'     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'advertise_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VtpAdvertiseLocation'), 'required' => false)),
      'priority'     => new sfValidatorInteger(),
      'portal_id'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vtp_advertise_location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpAdvertiseLocation';
  }

}

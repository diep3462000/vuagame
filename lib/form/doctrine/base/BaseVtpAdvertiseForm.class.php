<?php

/**
 * VtpAdvertise form base class.
 *
 * @method VtpAdvertise getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtpAdvertiseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'location'    => new sfWidgetFormInputText(),
      'view_type'   => new sfWidgetFormInputText(),
      'amount'      => new sfWidgetFormInputText(),
      'width'       => new sfWidgetFormInputText(),
      'height'      => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'portal_id'   => new sfWidgetFormInputText(),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'location'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'view_type'   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'amount'      => new sfValidatorInteger(array('required' => false)),
      'width'       => new sfValidatorInteger(array('required' => false)),
      'height'      => new sfValidatorInteger(array('required' => false)),
      'is_active'   => new sfValidatorBoolean(array('required' => false)),
      'portal_id'   => new sfValidatorInteger(array('required' => false)),
      'created_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'required' => false)),
      'updated_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vtp_advertise[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpAdvertise';
  }

}

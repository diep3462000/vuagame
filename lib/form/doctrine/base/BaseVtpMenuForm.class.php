<?php

/**
 * VtpMenu form base class.
 *
 * @method VtpMenu getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtpMenuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'image_path'  => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'lang'        => new sfWidgetFormInputText(),
      'parent_id'   => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'link'        => new sfWidgetFormInputText(),
      'level'       => new sfWidgetFormInputText(),
      'priority'    => new sfWidgetFormInputText(),
      'is_detail'   => new sfWidgetFormInputText(),
      'type'        => new sfWidgetFormInputText(),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_3'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'portal_id'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('required' => false)),
      'image_path'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_active'   => new sfValidatorInteger(array('required' => false)),
      'lang'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'parent_id'   => new sfValidatorInteger(array('required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255)),
      'link'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'level'       => new sfValidatorInteger(array('required' => false)),
      'priority'    => new sfValidatorInteger(array('required' => false)),
      'is_detail'   => new sfValidatorInteger(array('required' => false)),
      'type'        => new sfValidatorInteger(array('required' => false)),
      'created_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'required' => false)),
      'updated_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_3'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'portal_id'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vtp_menu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpMenu';
  }

}

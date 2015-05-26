<?php

/**
 * VtpLink form base class.
 *
 * @method VtpLink getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtpLinkForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'group_id'   => new sfWidgetFormInputText(),
      'link'       => new sfWidgetFormTextarea(),
      'file_path'  => new sfWidgetFormInputText(),
      'priority'   => new sfWidgetFormInputText(),
      'is_active'  => new sfWidgetFormInputText(),
      'lang'       => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'updated_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_2'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'portal_id'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'group_id'   => new sfValidatorInteger(),
      'link'       => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'file_path'  => new sfValidatorString(array('max_length' => 255)),
      'priority'   => new sfValidatorInteger(),
      'is_active'  => new sfValidatorInteger(array('required' => false)),
      'lang'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255)),
      'created_by' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'required' => false)),
      'updated_by' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_2'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'portal_id'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vtp_link[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpLink';
  }

}

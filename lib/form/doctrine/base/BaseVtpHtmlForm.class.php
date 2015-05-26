<?php

/**
 * VtpHtml form base class.
 *
 * @method VtpHtml getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtpHtmlForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'module_id'   => new sfWidgetFormInputText(),
      'portal_id'   => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_delete'   => new sfWidgetFormInputText(),
      'delete_by'   => new sfWidgetFormInputText(),
      'delete_at'   => new sfWidgetFormDateTime(),
      'lang'        => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'prefix_path' => new sfWidgetFormInputText(),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_2'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'content'     => new sfValidatorString(array('required' => false)),
      'module_id'   => new sfValidatorInteger(array('required' => false)),
      'portal_id'   => new sfValidatorInteger(array('required' => false)),
      'is_active'   => new sfValidatorInteger(array('required' => false)),
      'is_delete'   => new sfValidatorInteger(array('required' => false)),
      'delete_by'   => new sfValidatorInteger(array('required' => false)),
      'delete_at'   => new sfValidatorDateTime(array('required' => false)),
      'lang'        => new sfValidatorString(array('max_length' => 10)),
      'slug'        => new sfValidatorString(array('max_length' => 255)),
      'prefix_path' => new sfValidatorString(array('max_length' => 255)),
      'created_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'required' => false)),
      'updated_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_2'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vtp_html[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpHtml';
  }

}

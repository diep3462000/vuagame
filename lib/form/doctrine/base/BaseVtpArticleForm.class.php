<?php

/**
 * VtpArticle form base class.
 *
 * @method VtpArticle getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtpArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'title'           => new sfWidgetFormTextarea(),
      'alttitle'        => new sfWidgetFormInputText(),
      'header'          => new sfWidgetFormTextarea(),
      'body'            => new sfWidgetFormTextarea(),
      'body_wap'        => new sfWidgetFormTextarea(),
      'image_path'      => new sfWidgetFormInputText(),
      'attributes'      => new sfWidgetFormInputText(),
      'hit_count'       => new sfWidgetFormInputText(),
      'priority'        => new sfWidgetFormInputText(),
      'published_time'  => new sfWidgetFormDateTime(),
      'expiredate_time' => new sfWidgetFormDateTime(),
      'meta'            => new sfWidgetFormInputText(),
      'keywords'        => new sfWidgetFormInputText(),
      'author'          => new sfWidgetFormInputText(),
      'other_link'      => new sfWidgetFormTextarea(),
      'is_active'       => new sfWidgetFormInputText(),
      'is_hot'          => new sfWidgetFormInputText(),
      'is_delete'       => new sfWidgetFormInputText(),
      'delete_by'       => new sfWidgetFormInputText(),
      'delete_at'       => new sfWidgetFormDateTime(),
      'lang'            => new sfWidgetFormInputText(),
      'slug'            => new sfWidgetFormInputText(),
      'category_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtpCategory'), 'add_empty' => true)),
      'survey_id'       => new sfWidgetFormInputText(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_3'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'portal_id'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'           => new sfValidatorString(),
      'alttitle'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'header'          => new sfValidatorString(array('required' => false)),
      'body'            => new sfValidatorString(array('required' => false)),
      'body_wap'        => new sfValidatorString(array('required' => false)),
      'image_path'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'attributes'      => new sfValidatorInteger(array('required' => false)),
      'hit_count'       => new sfValidatorInteger(array('required' => false)),
      'priority'        => new sfValidatorInteger(),
      'published_time'  => new sfValidatorDateTime(array('required' => false)),
      'expiredate_time' => new sfValidatorDateTime(array('required' => false)),
      'meta'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'keywords'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'author'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'other_link'      => new sfValidatorString(array('required' => false)),
      'is_active'       => new sfValidatorInteger(array('required' => false)),
      'is_hot'          => new sfValidatorInteger(array('required' => false)),
      'is_delete'       => new sfValidatorInteger(array('required' => false)),
      'delete_by'       => new sfValidatorInteger(array('required' => false)),
      'delete_at'       => new sfValidatorDateTime(array('required' => false)),
      'lang'            => new sfValidatorString(array('max_length' => 10)),
      'slug'            => new sfValidatorString(array('max_length' => 255)),
      'category_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VtpCategory'), 'required' => false)),
      'survey_id'       => new sfValidatorInteger(array('required' => false)),
      'created_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'required' => false)),
      'updated_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_3'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'portal_id'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vtp_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpArticle';
  }

}

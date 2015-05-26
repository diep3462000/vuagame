<?php

/**
 * VtpArticle filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVtpArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'alttitle'        => new sfWidgetFormFilterInput(),
      'header'          => new sfWidgetFormFilterInput(),
      'body'            => new sfWidgetFormFilterInput(),
      'body_wap'        => new sfWidgetFormFilterInput(),
      'image_path'      => new sfWidgetFormFilterInput(),
      'attributes'      => new sfWidgetFormFilterInput(),
      'hit_count'       => new sfWidgetFormFilterInput(),
      'priority'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'published_time'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'expiredate_time' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'meta'            => new sfWidgetFormFilterInput(),
      'keywords'        => new sfWidgetFormFilterInput(),
      'author'          => new sfWidgetFormFilterInput(),
      'other_link'      => new sfWidgetFormFilterInput(),
      'is_active'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_hot'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_delete'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'delete_by'       => new sfWidgetFormFilterInput(),
      'delete_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'lang'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtpCategory'), 'add_empty' => true)),
      'survey_id'       => new sfWidgetFormFilterInput(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser_3'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'portal_id'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'           => new sfValidatorPass(array('required' => false)),
      'alttitle'        => new sfValidatorPass(array('required' => false)),
      'header'          => new sfValidatorPass(array('required' => false)),
      'body'            => new sfValidatorPass(array('required' => false)),
      'body_wap'        => new sfValidatorPass(array('required' => false)),
      'image_path'      => new sfValidatorPass(array('required' => false)),
      'attributes'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hit_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'priority'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published_time'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'expiredate_time' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'meta'            => new sfValidatorPass(array('required' => false)),
      'keywords'        => new sfValidatorPass(array('required' => false)),
      'author'          => new sfValidatorPass(array('required' => false)),
      'other_link'      => new sfValidatorPass(array('required' => false)),
      'is_active'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_hot'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_delete'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'delete_by'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'delete_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lang'            => new sfValidatorPass(array('required' => false)),
      'slug'            => new sfValidatorPass(array('required' => false)),
      'category_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VtpCategory'), 'column' => 'id')),
      'survey_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SfGuardUser'), 'column' => 'id')),
      'updated_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SfGuardUser_3'), 'column' => 'id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'portal_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vtp_article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpArticle';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'title'           => 'Text',
      'alttitle'        => 'Text',
      'header'          => 'Text',
      'body'            => 'Text',
      'body_wap'        => 'Text',
      'image_path'      => 'Text',
      'attributes'      => 'Number',
      'hit_count'       => 'Number',
      'priority'        => 'Number',
      'published_time'  => 'Date',
      'expiredate_time' => 'Date',
      'meta'            => 'Text',
      'keywords'        => 'Text',
      'author'          => 'Text',
      'other_link'      => 'Text',
      'is_active'       => 'Number',
      'is_hot'          => 'Number',
      'is_delete'       => 'Number',
      'delete_by'       => 'Number',
      'delete_at'       => 'Date',
      'lang'            => 'Text',
      'slug'            => 'Text',
      'category_id'     => 'ForeignKey',
      'survey_id'       => 'Number',
      'created_by'      => 'ForeignKey',
      'updated_by'      => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'portal_id'       => 'Number',
    );
  }
}

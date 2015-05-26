<?php

/**
 * AnnouncementReaded filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnnouncementReadedFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'   => new sfWidgetFormFilterInput(),
      'readedid' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'userid'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'readedid' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('announcement_readed_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnnouncementReaded';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'userid'   => 'Number',
      'readedid' => 'Text',
    );
  }
}

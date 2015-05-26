<?php

/**
 * Announcement filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnnouncementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp'      => new sfWidgetFormFilterInput(),
      'subject' => new sfWidgetFormFilterInput(),
      'content' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'time'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'cp'      => new sfValidatorPass(array('required' => false)),
      'subject' => new sfValidatorPass(array('required' => false)),
      'content' => new sfValidatorPass(array('required' => false)),
      'time'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('announcement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Announcement';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'cp'      => 'Text',
      'subject' => 'Text',
      'content' => 'Text',
      'time'    => 'Date',
    );
  }
}

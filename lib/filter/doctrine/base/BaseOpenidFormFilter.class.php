<?php

/**
 * Openid filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOpenidFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'openid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chanel'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datecreated' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'userid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'openid'      => new sfValidatorPass(array('required' => false)),
      'chanel'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'datecreated' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('openid_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Openid';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'userid'      => 'Number',
      'openid'      => 'Text',
      'chanel'      => 'Number',
      'datecreated' => 'Date',
    );
  }
}

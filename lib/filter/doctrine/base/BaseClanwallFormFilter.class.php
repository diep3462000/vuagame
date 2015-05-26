<?php

/**
 * Clanwall filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClanwallFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'clanid'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userid'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'postdate' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'clanid'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userid'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'message'  => new sfValidatorPass(array('required' => false)),
      'postdate' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('clanwall_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanwall';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'clanid'   => 'Number',
      'userid'   => 'Number',
      'message'  => 'Text',
      'postdate' => 'Date',
    );
  }
}

<?php

/**
 * Clanupgrade filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClanupgradeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'level'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'money'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalslot' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'level'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'money'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalslot' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('clanupgrade_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanupgrade';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'level'     => 'Number',
      'money'     => 'Number',
      'totalslot' => 'Number',
    );
  }
}

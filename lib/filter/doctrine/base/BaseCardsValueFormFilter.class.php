<?php

/**
 * CardsValue filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCardsValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rm_money'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vm_money'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rm_money'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vm_money'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cards_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CardsValue';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'rm_money'    => 'Number',
      'vm_money'    => 'Number',
      'description' => 'Text',
    );
  }
}

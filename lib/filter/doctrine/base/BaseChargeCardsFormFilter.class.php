<?php

/**
 * ChargeCards filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChargeCardsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cardid'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cardname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cardid'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cardname' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('charge_cards_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChargeCards';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'cardid'   => 'Number',
      'cardname' => 'Text',
    );
  }
}

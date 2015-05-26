<?php

/**
 * PromotionRule filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePromotionRuleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rule_start'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'rule_end'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'rule_card'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rule_sms'               => new sfWidgetFormFilterInput(),
      'rule_active'            => new sfWidgetFormFilterInput(),
      'rule_title'             => new sfWidgetFormFilterInput(),
      'rule_description'       => new sfWidgetFormFilterInput(),
      'rule_card_special'      => new sfWidgetFormFilterInput(),
      'rule_price_tier'        => new sfWidgetFormFilterInput(),
      'cp'                     => new sfWidgetFormFilterInput(),
      'rule_high_card_special' => new sfWidgetFormFilterInput(),
      'rule_high_price_tier'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rule_start'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'rule_end'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'rule_card'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rule_sms'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rule_active'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rule_title'             => new sfValidatorPass(array('required' => false)),
      'rule_description'       => new sfValidatorPass(array('required' => false)),
      'rule_card_special'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rule_price_tier'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp'                     => new sfValidatorPass(array('required' => false)),
      'rule_high_card_special' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rule_high_price_tier'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('promotion_rule_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PromotionRule';
  }

  public function getFields()
  {
    return array(
      'rule_id'                => 'Number',
      'rule_start'             => 'Date',
      'rule_end'               => 'Date',
      'rule_card'              => 'Number',
      'rule_sms'               => 'Number',
      'rule_active'            => 'Number',
      'rule_title'             => 'Text',
      'rule_description'       => 'Text',
      'rule_card_special'      => 'Number',
      'rule_price_tier'        => 'Number',
      'cp'                     => 'Text',
      'rule_high_card_special' => 'Number',
      'rule_high_price_tier'   => 'Number',
    );
  }
}

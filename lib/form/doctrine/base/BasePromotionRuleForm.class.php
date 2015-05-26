<?php

/**
 * PromotionRule form base class.
 *
 * @method PromotionRule getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePromotionRuleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rule_id'                => new sfWidgetFormInputHidden(),
      'rule_start'             => new sfWidgetFormDateTime(),
      'rule_end'               => new sfWidgetFormDateTime(),
      'rule_card'              => new sfWidgetFormInputText(),
      'rule_sms'               => new sfWidgetFormInputText(),
      'rule_active'            => new sfWidgetFormInputText(),
      'rule_title'             => new sfWidgetFormInputText(),
      'rule_description'       => new sfWidgetFormTextarea(),
      'rule_card_special'      => new sfWidgetFormInputText(),
      'rule_price_tier'        => new sfWidgetFormInputText(),
      'cp'                     => new sfWidgetFormInputText(),
      'rule_high_card_special' => new sfWidgetFormInputText(),
      'rule_high_price_tier'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'rule_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('rule_id')), 'empty_value' => $this->getObject()->get('rule_id'), 'required' => false)),
      'rule_start'             => new sfValidatorDateTime(array('required' => false)),
      'rule_end'               => new sfValidatorDateTime(array('required' => false)),
      'rule_card'              => new sfValidatorInteger(array('required' => false)),
      'rule_sms'               => new sfValidatorInteger(array('required' => false)),
      'rule_active'            => new sfValidatorInteger(array('required' => false)),
      'rule_title'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rule_description'       => new sfValidatorString(array('required' => false)),
      'rule_card_special'      => new sfValidatorInteger(array('required' => false)),
      'rule_price_tier'        => new sfValidatorInteger(array('required' => false)),
      'cp'                     => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'rule_high_card_special' => new sfValidatorInteger(array('required' => false)),
      'rule_high_price_tier'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('promotion_rule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PromotionRule';
  }

}

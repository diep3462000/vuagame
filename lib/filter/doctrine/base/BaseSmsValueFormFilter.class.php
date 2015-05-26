<?php

/**
 * SmsValue filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSmsValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'     => new sfWidgetFormFilterInput(),
      'vm_money' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'code'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vm_money' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sms_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SmsValue';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'code'     => 'Number',
      'vm_money' => 'Number',
    );
  }
}

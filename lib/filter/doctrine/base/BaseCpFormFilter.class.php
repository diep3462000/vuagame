<?php

/**
 * Cp filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_name'              => new sfWidgetFormFilterInput(),
      'vm_name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'shortcode_sms1'       => new sfWidgetFormFilterInput(),
      'shortcode_sms2'       => new sfWidgetFormFilterInput(),
      'shortcode_active_sms' => new sfWidgetFormFilterInput(),
      'keyword'              => new sfWidgetFormFilterInput(),
      'keyword_active'       => new sfWidgetFormFilterInput(),
      'enable_sms'           => new sfWidgetFormFilterInput(),
      'enable_active_sms'    => new sfWidgetFormFilterInput(),
      'password_charging'    => new sfWidgetFormFilterInput(),
      'enable_ios_chaging'   => new sfWidgetFormFilterInput(),
      'link_android'         => new sfWidgetFormFilterInput(),
      'link_ios'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cp_name'              => new sfValidatorPass(array('required' => false)),
      'vm_name'              => new sfValidatorPass(array('required' => false)),
      'shortcode_sms1'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'shortcode_sms2'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'shortcode_active_sms' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'keyword'              => new sfValidatorPass(array('required' => false)),
      'keyword_active'       => new sfValidatorPass(array('required' => false)),
      'enable_sms'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'enable_active_sms'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'password_charging'    => new sfValidatorPass(array('required' => false)),
      'enable_ios_chaging'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'link_android'         => new sfValidatorPass(array('required' => false)),
      'link_ios'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cp';
  }

  public function getFields()
  {
    return array(
      'cp_id'                => 'Number',
      'cp_name'              => 'Text',
      'vm_name'              => 'Text',
      'shortcode_sms1'       => 'Number',
      'shortcode_sms2'       => 'Number',
      'shortcode_active_sms' => 'Number',
      'keyword'              => 'Text',
      'keyword_active'       => 'Text',
      'enable_sms'           => 'Number',
      'enable_active_sms'    => 'Number',
      'password_charging'    => 'Text',
      'enable_ios_chaging'   => 'Number',
      'link_android'         => 'Text',
      'link_ios'             => 'Text',
    );
  }
}

<?php

/**
 * ConfigCard filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConfigCardFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'system'      => new sfWidgetFormFilterInput(),
      'cp'          => new sfWidgetFormFilterInput(),
      'system_card' => new sfWidgetFormFilterInput(),
      'status'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'system'      => new sfValidatorPass(array('required' => false)),
      'cp'          => new sfValidatorPass(array('required' => false)),
      'system_card' => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('config_card_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigCard';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'system'      => 'Text',
      'cp'          => 'Text',
      'system_card' => 'Text',
      'status'      => 'Number',
    );
  }
}

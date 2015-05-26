<?php

/**
 * TransType filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTransTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type' => new sfValidatorPass(array('required' => false)),
      'code' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trans_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransType';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'type' => 'Text',
      'code' => 'Text',
    );
  }
}

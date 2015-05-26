<?php

/**
 * VtpAdvertiseLocation filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVtpAdvertiseLocationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'page'         => new sfWidgetFormFilterInput(),
      'template'     => new sfWidgetFormFilterInput(),
      'advertise_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtpAdvertiseLocation'), 'add_empty' => true)),
      'priority'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'portal_id'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'page'         => new sfValidatorPass(array('required' => false)),
      'template'     => new sfValidatorPass(array('required' => false)),
      'advertise_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VtpAdvertiseLocation'), 'column' => 'id')),
      'priority'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'portal_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vtp_advertise_location_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtpAdvertiseLocation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'page'         => 'Text',
      'template'     => 'Text',
      'advertise_id' => 'ForeignKey',
      'priority'     => 'Number',
      'portal_id'    => 'Number',
    );
  }
}

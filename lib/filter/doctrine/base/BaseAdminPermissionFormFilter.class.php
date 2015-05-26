<?php

/**
 * AdminPermission filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdminPermissionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'per_class'  => new sfWidgetFormFilterInput(),
      'per_action' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'per_class'  => new sfValidatorPass(array('required' => false)),
      'per_action' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminPermission';
  }

  public function getFields()
  {
    return array(
      'per_id'     => 'Number',
      'id'         => 'Number',
      'per_class'  => 'Text',
      'per_action' => 'Text',
    );
  }
}

<?php

/**
 * Admin filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdminFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp'        => new sfWidgetFormFilterInput(),
      'roleid'    => new sfWidgetFormFilterInput(),
      'is_active' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'username'  => new sfValidatorPass(array('required' => false)),
      'password'  => new sfValidatorPass(array('required' => false)),
      'name'      => new sfValidatorPass(array('required' => false)),
      'cp'        => new sfValidatorPass(array('required' => false)),
      'roleid'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_active' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('admin_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Admin';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'username'  => 'Text',
      'password'  => 'Text',
      'name'      => 'Text',
      'cp'        => 'Text',
      'roleid'    => 'Number',
      'is_active' => 'Number',
    );
  }
}

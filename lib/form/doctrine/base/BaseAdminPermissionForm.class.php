<?php

/**
 * AdminPermission form base class.
 *
 * @method AdminPermission getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdminPermissionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'per_id'     => new sfWidgetFormInputHidden(),
      'id'         => new sfWidgetFormInputText(),
      'per_class'  => new sfWidgetFormInputText(),
      'per_action' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'per_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('per_id')), 'empty_value' => $this->getObject()->get('per_id'), 'required' => false)),
      'id'         => new sfValidatorInteger(),
      'per_class'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'per_action' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminPermission';
  }

}

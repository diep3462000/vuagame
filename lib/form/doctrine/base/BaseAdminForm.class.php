<?php

/**
 * Admin form base class.
 *
 * @method Admin getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdminForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'username'  => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputText(),
      'name'      => new sfWidgetFormTextarea(),
      'cp'        => new sfWidgetFormTextarea(),
      'roleid'    => new sfWidgetFormInputText(),
      'is_active' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'  => new sfValidatorString(array('max_length' => 255)),
      'password'  => new sfValidatorString(array('max_length' => 255)),
      'name'      => new sfValidatorString(array('max_length' => 1000)),
      'cp'        => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'roleid'    => new sfValidatorInteger(array('required' => false)),
      'is_active' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Admin';
  }

}

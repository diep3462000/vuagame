<?php

/**
 * Clanrole form base class.
 *
 * @method Clanrole getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClanroleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'approve'   => new sfWidgetFormInputText(),
      'kick'      => new sfWidgetFormInputText(),
      'changebio' => new sfWidgetFormInputText(),
      'sendall'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'approve'   => new sfValidatorInteger(array('required' => false)),
      'kick'      => new sfValidatorInteger(array('required' => false)),
      'changebio' => new sfValidatorInteger(array('required' => false)),
      'sendall'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('clanrole[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanrole';
  }

}

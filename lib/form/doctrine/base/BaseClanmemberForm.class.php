<?php

/**
 * Clanmember form base class.
 *
 * @method Clanmember getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClanmemberForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormInputText(),
      'joindate'    => new sfWidgetFormDateTime(),
      'role'        => new sfWidgetFormInputText(),
      'applystatus' => new sfWidgetFormInputText(),
      'clanpoint'   => new sfWidgetFormInputText(),
      'clandonate'  => new sfWidgetFormInputText(),
      'clanid'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'     => new sfValidatorInteger(),
      'joindate'    => new sfValidatorDateTime(),
      'role'        => new sfValidatorInteger(array('required' => false)),
      'applystatus' => new sfValidatorInteger(array('required' => false)),
      'clanpoint'   => new sfValidatorInteger(array('required' => false)),
      'clandonate'  => new sfValidatorInteger(array('required' => false)),
      'clanid'      => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('clanmember[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanmember';
  }

}

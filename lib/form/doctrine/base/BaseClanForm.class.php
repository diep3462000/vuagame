<?php

/**
 * Clan form base class.
 *
 * @method Clan getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClanForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'level'       => new sfWidgetFormInputText(),
      'avatarid'    => new sfWidgetFormInputText(),
      'createtime'  => new sfWidgetFormDateTime(),
      'tag'         => new sfWidgetFormInputText(),
      'ownerid'     => new sfWidgetFormInputText(),
      'bio'         => new sfWidgetFormTextarea(),
      'clanmoney'   => new sfWidgetFormInputText(),
      'shortdesc'   => new sfWidgetFormInputText(),
      'totalmember' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'level'       => new sfValidatorInteger(array('required' => false)),
      'avatarid'    => new sfValidatorInteger(array('required' => false)),
      'createtime'  => new sfValidatorDateTime(),
      'tag'         => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'ownerid'     => new sfValidatorInteger(array('required' => false)),
      'bio'         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'clanmoney'   => new sfValidatorInteger(array('required' => false)),
      'shortdesc'   => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'totalmember' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('clan[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clan';
  }

}

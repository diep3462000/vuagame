<?php

/**
 * APartner form base class.
 *
 * @method APartner getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAPartnerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'partnername' => new sfWidgetFormInputText(),
      'smsnumber'   => new sfWidgetFormInputText(),
      'username'    => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputText(),
      'accesskey1'  => new sfWidgetFormInputText(),
      'accesskey2'  => new sfWidgetFormInputText(),
      'datecreated' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'partnername' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'smsnumber'   => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'username'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'password'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'accesskey1'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'accesskey2'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'datecreated' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('a_partner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'APartner';
  }

}

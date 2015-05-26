<?php

/**
 * APaycard form base class.
 *
 * @method APaycard getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAPaycardForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'cardnumber'   => new sfWidgetFormInputText(),
      'cardserial'   => new sfWidgetFormInputText(),
      'username'     => new sfWidgetFormInputText(),
      'cardprovider' => new sfWidgetFormInputText(),
      'cp'           => new sfWidgetFormInputText(),
      'channel'      => new sfWidgetFormInputText(),
      'refno'        => new sfWidgetFormInputText(),
      'cardprice'    => new sfWidgetFormInputText(),
      'gameprice'    => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputText(),
      'resmsg'       => new sfWidgetFormInputText(),
      'datecreated'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cardnumber'   => new sfValidatorString(array('max_length' => 50)),
      'cardserial'   => new sfValidatorString(array('max_length' => 50)),
      'username'     => new sfValidatorString(array('max_length' => 50)),
      'cardprovider' => new sfValidatorString(array('max_length' => 10)),
      'cp'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'channel'      => new sfValidatorInteger(array('required' => false)),
      'refno'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'cardprice'    => new sfValidatorInteger(),
      'gameprice'    => new sfValidatorInteger(),
      'status'       => new sfValidatorInteger(array('required' => false)),
      'resmsg'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'datecreated'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('a_paycard[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'APaycard';
  }

}

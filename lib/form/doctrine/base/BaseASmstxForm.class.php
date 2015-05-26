<?php

/**
 * ASmstx form base class.
 *
 * @method ASmstx getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseASmstxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'gameid'         => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputText(),
      'partnerid'      => new sfWidgetFormInputText(),
      'txref'          => new sfWidgetFormInputText(),
      'operatornumber' => new sfWidgetFormInputText(),
      'cmdcode'        => new sfWidgetFormInputText(),
      'msisdn'         => new sfWidgetFormInputText(),
      'mobody'         => new sfWidgetFormInputText(),
      'targetuser'     => new sfWidgetFormInputText(),
      'receivedtime'   => new sfWidgetFormDateTime(),
      'mtbody'         => new sfWidgetFormInputText(),
      'responetime'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'gameid'         => new sfValidatorInteger(array('required' => false)),
      'status'         => new sfValidatorInteger(array('required' => false)),
      'partnerid'      => new sfValidatorInteger(),
      'txref'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'operatornumber' => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'cmdcode'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'msisdn'         => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'mobody'         => new sfValidatorString(array('max_length' => 160)),
      'targetuser'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'receivedtime'   => new sfValidatorDateTime(),
      'mtbody'         => new sfValidatorString(array('max_length' => 160, 'required' => false)),
      'responetime'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_smstx[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ASmstx';
  }

}

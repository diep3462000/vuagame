<?php

/**
 * DeviceInfo form base class.
 *
 * @method DeviceInfo getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDeviceInfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'unique_id'     => new sfWidgetFormInputText(),
      'device_series' => new sfWidgetFormInputText(),
      'os'            => new sfWidgetFormInputText(),
      'cp_id'         => new sfWidgetFormInputText(),
      'time'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'unique_id'     => new sfValidatorString(array('max_length' => 50)),
      'device_series' => new sfValidatorString(array('max_length' => 200)),
      'os'            => new sfValidatorString(array('max_length' => 50)),
      'cp_id'         => new sfValidatorInteger(),
      'time'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('device_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DeviceInfo';
  }

}

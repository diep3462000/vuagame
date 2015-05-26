<?php

/**
 * VtSerialCode form base class.
 *
 * @method VtSerialCode getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtSerialCodeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'serial'     => new sfWidgetFormInputText(),
      'cardnumber' => new sfWidgetFormInputText(),
      'user_id'    => new sfWidgetFormInputText(),
      'charg_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtChargAmount'), 'add_empty' => false)),
      'type'       => new sfWidgetFormInputText(),
      'is_status'  => new sfWidgetFormInputCheckbox(),
      'end_date'   => new sfWidgetFormInputText(),
      'dai_ly_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtDaiLy'), 'add_empty' => false)),
      'admin_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'serial'     => new sfValidatorString(array('max_length' => 30)),
      'cardnumber' => new sfValidatorString(array('max_length' => 30)),
      'user_id'    => new sfValidatorPass(),
      'charg_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VtChargAmount'))),
      'type'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'is_status'  => new sfValidatorBoolean(array('required' => false)),
      'end_date'   => new sfValidatorPass(),
      'dai_ly_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VtDaiLy'))),
      'admin_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vt_serial_code[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtSerialCode';
  }

}

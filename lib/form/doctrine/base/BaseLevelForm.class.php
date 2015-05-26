<?php

/**
 * Level form base class.
 *
 * @method Level getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLevelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'cash'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'level'       => new sfWidgetFormInputText(),
      'exp'         => new sfWidgetFormInputText(),
      'cashGift'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 20)),
      'cash'        => new sfValidatorPass(),
      'description' => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'level'       => new sfValidatorPass(),
      'exp'         => new sfValidatorString(array('max_length' => 30)),
      'cashGift'    => new sfValidatorPass(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Level', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Level', 'column' => array('cash'))),
        new sfValidatorDoctrineUnique(array('model' => 'Level', 'column' => array('level'))),
        new sfValidatorDoctrineUnique(array('model' => 'Level', 'column' => array('exp'))),
        new sfValidatorDoctrineUnique(array('model' => 'Level', 'column' => array('cashGift'))),
      ))
    );

    $this->widgetSchema->setNameFormat('level[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Level';
  }

}

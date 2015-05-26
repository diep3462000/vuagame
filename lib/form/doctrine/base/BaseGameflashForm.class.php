<?php

/**
 * Gameflash form base class.
 *
 * @method Gameflash getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGameflashForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormTextarea(),
      'category'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GameflashType'), 'add_empty' => true)),
      'description' => new sfWidgetFormTextarea(),
      'state'       => new sfWidgetFormInputCheckbox(),
      'flash'       => new sfWidgetFormTextarea(),
      'screen'      => new sfWidgetFormTextarea(),
      'visit'       => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'category'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GameflashType'), 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'state'       => new sfValidatorBoolean(array('required' => false)),
      'flash'       => new sfValidatorString(array('max_length' => 3000, 'required' => false)),
      'screen'      => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'visit'       => new sfValidatorInteger(array('required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Gameflash', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('gameflash[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gameflash';
  }

}

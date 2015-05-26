<?php

/**
 * AGame filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAGameFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gamename' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'gamename' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_game_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AGame';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'gamename' => 'Text',
    );
  }
}

<?php

/**
 * Level filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLevelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cash'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(),
      'level'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exp'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cashGift'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'cash'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'level'       => new sfValidatorPass(array('required' => false)),
      'exp'         => new sfValidatorPass(array('required' => false)),
      'cashGift'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('level_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Level';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'cash'        => 'Text',
      'description' => 'Text',
      'level'       => 'Text',
      'exp'         => 'Text',
      'cashGift'    => 'Text',
    );
  }
}

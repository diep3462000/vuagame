<?php

/**
 * Gameflash filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGameflashFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'category'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GameflashType'), 'add_empty' => true)),
      'description' => new sfWidgetFormFilterInput(),
      'state'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'flash'       => new sfWidgetFormFilterInput(),
      'screen'      => new sfWidgetFormFilterInput(),
      'visit'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'category'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GameflashType'), 'column' => 'id')),
      'description' => new sfValidatorPass(array('required' => false)),
      'state'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'flash'       => new sfValidatorPass(array('required' => false)),
      'screen'      => new sfValidatorPass(array('required' => false)),
      'visit'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gameflash_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gameflash';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'category'    => 'ForeignKey',
      'description' => 'Text',
      'state'       => 'Boolean',
      'flash'       => 'Text',
      'screen'      => 'Text',
      'visit'       => 'Number',
      'slug'        => 'Text',
    );
  }
}

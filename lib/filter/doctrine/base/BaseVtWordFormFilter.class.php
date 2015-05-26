<?php

/**
 * VtWord filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVtWordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'word' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'word' => new sfValidatorPass(array('required' => false)),
      'type' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vt_word_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtWord';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'word' => 'Text',
      'type' => 'Number',
    );
  }
}

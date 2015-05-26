<?php

/**
 * Emoticon filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmoticonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'emoticon' => new sfWidgetFormFilterInput(),
      'status'   => new sfWidgetFormFilterInput(),
      'type'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'emoticon' => new sfValidatorPass(array('required' => false)),
      'status'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('emoticon_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Emoticon';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'emoticon' => 'Text',
      'status'   => 'Number',
      'type'     => 'Text',
    );
  }
}

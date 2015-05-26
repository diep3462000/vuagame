<?php

/**
 * Clanrole filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClanroleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(),
      'approve'   => new sfWidgetFormFilterInput(),
      'kick'      => new sfWidgetFormFilterInput(),
      'changebio' => new sfWidgetFormFilterInput(),
      'sendall'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'approve'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kick'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'changebio' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sendall'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('clanrole_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clanrole';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'approve'   => 'Number',
      'kick'      => 'Number',
      'changebio' => 'Number',
      'sendall'   => 'Number',
    );
  }
}

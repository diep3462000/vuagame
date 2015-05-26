<?php

/**
 * Clan filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClanFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'level'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'avatarid'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'createtime'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tag'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ownerid'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bio'         => new sfWidgetFormFilterInput(),
      'clanmoney'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'shortdesc'   => new sfWidgetFormFilterInput(),
      'totalmember' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'level'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatarid'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'createtime'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'tag'         => new sfValidatorPass(array('required' => false)),
      'ownerid'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bio'         => new sfValidatorPass(array('required' => false)),
      'clanmoney'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'shortdesc'   => new sfValidatorPass(array('required' => false)),
      'totalmember' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('clan_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clan';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'level'       => 'Number',
      'avatarid'    => 'Number',
      'createtime'  => 'Date',
      'tag'         => 'Text',
      'ownerid'     => 'Number',
      'bio'         => 'Text',
      'clanmoney'   => 'Number',
      'shortdesc'   => 'Text',
      'totalmember' => 'Number',
    );
  }
}

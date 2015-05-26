<?php

/**
 * ASmstx filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseASmstxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gameid'         => new sfWidgetFormFilterInput(),
      'status'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'partnerid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'txref'          => new sfWidgetFormFilterInput(),
      'operatornumber' => new sfWidgetFormFilterInput(),
      'cmdcode'        => new sfWidgetFormFilterInput(),
      'msisdn'         => new sfWidgetFormFilterInput(),
      'mobody'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'targetuser'     => new sfWidgetFormFilterInput(),
      'receivedtime'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'mtbody'         => new sfWidgetFormFilterInput(),
      'responetime'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'gameid'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'partnerid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'txref'          => new sfValidatorPass(array('required' => false)),
      'operatornumber' => new sfValidatorPass(array('required' => false)),
      'cmdcode'        => new sfValidatorPass(array('required' => false)),
      'msisdn'         => new sfValidatorPass(array('required' => false)),
      'mobody'         => new sfValidatorPass(array('required' => false)),
      'targetuser'     => new sfValidatorPass(array('required' => false)),
      'receivedtime'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'mtbody'         => new sfValidatorPass(array('required' => false)),
      'responetime'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('a_smstx_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ASmstx';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'gameid'         => 'Number',
      'status'         => 'Number',
      'partnerid'      => 'Number',
      'txref'          => 'Text',
      'operatornumber' => 'Text',
      'cmdcode'        => 'Text',
      'msisdn'         => 'Text',
      'mobody'         => 'Text',
      'targetuser'     => 'Text',
      'receivedtime'   => 'Date',
      'mtbody'         => 'Text',
      'responetime'    => 'Date',
    );
  }
}

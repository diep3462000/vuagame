<?php

/**
 * APaycard filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAPaycardFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cardnumber'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cardserial'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cardprovider' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp'           => new sfWidgetFormFilterInput(),
      'channel'      => new sfWidgetFormFilterInput(),
      'refno'        => new sfWidgetFormFilterInput(),
      'cardprice'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gameprice'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'resmsg'       => new sfWidgetFormFilterInput(),
      'datecreated'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'cardnumber'   => new sfValidatorPass(array('required' => false)),
      'cardserial'   => new sfValidatorPass(array('required' => false)),
      'username'     => new sfValidatorPass(array('required' => false)),
      'cardprovider' => new sfValidatorPass(array('required' => false)),
      'cp'           => new sfValidatorPass(array('required' => false)),
      'channel'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'refno'        => new sfValidatorPass(array('required' => false)),
      'cardprice'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gameprice'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'resmsg'       => new sfValidatorPass(array('required' => false)),
      'datecreated'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('a_paycard_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'APaycard';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'cardnumber'   => 'Text',
      'cardserial'   => 'Text',
      'username'     => 'Text',
      'cardprovider' => 'Text',
      'cp'           => 'Text',
      'channel'      => 'Number',
      'refno'        => 'Text',
      'cardprice'    => 'Number',
      'gameprice'    => 'Number',
      'status'       => 'Number',
      'resmsg'       => 'Text',
      'datecreated'  => 'Date',
    );
  }
}

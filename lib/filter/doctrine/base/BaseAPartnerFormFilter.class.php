<?php

/**
 * APartner filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAPartnerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'partnername' => new sfWidgetFormFilterInput(),
      'smsnumber'   => new sfWidgetFormFilterInput(),
      'username'    => new sfWidgetFormFilterInput(),
      'password'    => new sfWidgetFormFilterInput(),
      'accesskey1'  => new sfWidgetFormFilterInput(),
      'accesskey2'  => new sfWidgetFormFilterInput(),
      'datecreated' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'partnername' => new sfValidatorPass(array('required' => false)),
      'smsnumber'   => new sfValidatorPass(array('required' => false)),
      'username'    => new sfValidatorPass(array('required' => false)),
      'password'    => new sfValidatorPass(array('required' => false)),
      'accesskey1'  => new sfValidatorPass(array('required' => false)),
      'accesskey2'  => new sfValidatorPass(array('required' => false)),
      'datecreated' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('a_partner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'APartner';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'partnername' => 'Text',
      'smsnumber'   => 'Text',
      'username'    => 'Text',
      'password'    => 'Text',
      'accesskey1'  => 'Text',
      'accesskey2'  => 'Text',
      'datecreated' => 'Date',
    );
  }
}

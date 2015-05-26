<?php

/**
 * UserBanChat filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserBanChatFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'      => new sfWidgetFormFilterInput(),
      'datecreated' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'detail'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'userid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'datecreated' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'detail'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_ban_chat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserBanChat';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'userid'      => 'Number',
      'datecreated' => 'Date',
      'detail'      => 'Text',
    );
  }
}

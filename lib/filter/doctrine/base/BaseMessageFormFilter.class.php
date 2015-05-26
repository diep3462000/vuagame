<?php

/**
 * Message filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMessageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'from_user_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'isnewcomment' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datetime'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'cp'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'parent_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'from_user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'isnewcomment' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'      => new sfValidatorPass(array('required' => false)),
      'datetime'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Message';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'parent_id'    => 'Number',
      'from_user_id' => 'Number',
      'isnewcomment' => 'Number',
      'type_id'      => 'Number',
      'comment'      => 'Text',
      'datetime'     => 'Date',
      'cp'           => 'Text',
    );
  }
}

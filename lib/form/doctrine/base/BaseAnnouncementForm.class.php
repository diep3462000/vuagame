<?php

/**
 * Announcement form base class.
 *
 * @method Announcement getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnnouncementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'cp'      => new sfWidgetFormInputText(),
      'subject' => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
      'time'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cp'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'subject' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'content' => new sfValidatorString(array('max_length' => 5000)),
      'time'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('announcement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Announcement';
  }

}

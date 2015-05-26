<?php

/**
 * AnnouncementReaded form base class.
 *
 * @method AnnouncementReaded getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnnouncementReadedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'userid'   => new sfWidgetFormInputText(),
      'readedid' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'userid'   => new sfValidatorNumber(array('required' => false)),
      'readedid' => new sfValidatorString(array('max_length' => 300, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('announcement_readed[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnnouncementReaded';
  }

}

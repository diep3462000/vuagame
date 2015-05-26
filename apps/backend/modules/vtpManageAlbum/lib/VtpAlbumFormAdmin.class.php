<?php

/**
 * VtpAlbum form.
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VtpAlbumFormAdmin extends BaseVtpAlbumForm
{
  public function configure()
  {
      $i18n = sfContext::getInstance()->getI18N();
      unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by']);
      $this->setWidgets(array(
        'id'          => new sfWidgetFormInputHidden(),
        'name'        => new sfWidgetFormInputText(),
        'description' => new sfWidgetFormTextarea(),
        'event_date'  => new sfWidgetFormDateTime(),
        'priority'    => new sfWidgetFormInputText(array('default' => 0), array('size' => 5, 'maxlength' => 5)),
        'is_active'   => new sfWidgetFormInputCheckbox(),
        'is_default'  => new sfWidgetFormInputCheckbox(),
      ));
      
      foreach ($this->getWidgetSchema()->getFields() as $name=>$field) {
            if (is_a($field, 'sfWidgetFormInputText')) {
              $f = $this->getObject()->getTable()->getDefinitionOf($name);
              if ($f && array_key_exists('length', $f)) {
                $len = $f['length'];
                $field->setAttribute('maxlength', $len);
                if ($len > 40) $len = 40;
                $field->setAttribute('size', $len);
              }
            }
          }
      
      $this->widgetSchema['event_date'] = new sfWidgetFormVnDatePicker(array(),array('readonly'=>true));
      $this->setValidators(array(
        'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
        'name'        => new sfValidatorString(array('max_length' => 255, 'trim' => true, 'required' => true)),
        'description' => new sfValidatorString(array('max_length' => 1000, 'trim' => true, 'required' => true)),
        'event_date'  => new sfValidatorDateTime(array('required' => false)),
        'priority'        => new sfValidatorInteger(array('required' => false,
            "min"=>0,
            'max'=>99999,
            'trim' => true),array(
                    'min'=>$i18n->__('Thứ tự phải là số nguyên dương'),
                    'max' => $i18n->__('Tối đa 5 ký tự'),
                    'invalid'=> $i18n->__('Thứ tự phải là số nguyên dương'))),
        'is_active'   => new sfValidatorBoolean(array('required' => false)),
        'is_default'  => new sfValidatorBoolean(array('required' => false)),
      ));
      $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(array('model' => 'VtpAlbum', 'column' => array('name'))));
      $this->widgetSchema->setNameFormat('vtp_album[%s]');
  }
  public function getModelName()
  {
    return 'VtpAlbum';
  }

    private function doBindType(&$values) {
        $values['name']=trim($values['name']);
        $values['description']=trim($values['description']);
    }

    protected function doBind(array $values) {
        $this->doBindType($values);
        parent::doBind($values);
    }
}

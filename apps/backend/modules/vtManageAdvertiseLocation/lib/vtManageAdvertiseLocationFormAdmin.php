<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 12/13/13
 * Time: 8:57 AM
 * To change this template use File | Settings | File Templates.
 */
class vtManageAdvertiseLocationFormAdmin extends BaseVtpAdvertiseLocationForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'id'                      => new sfWidgetFormInputHidden(),
            'name'                    => new sfWidgetFormInputText(array(),array('maxlength' =>200)),
            'page'                    => new sfWidgetFormChoice(array(
                                            'choices' => $this->getPage(),
                                            'multiple' => false,
                                            'expanded' => false
                                        )),
            'template'                => new sfWidgetFormChoice(array(
                                            'choices' => $this->getTemplate(),
                                            'multiple' => false,
                                            'expanded' => false
                                        )),
            'priority'                => new sfWidgetFormInputText(array('default' => 0), array('size' => 5, 'maxlength' => 5)),
            'advertise_id' => new sfWidgetFormChoice(array(
                                'choices' => $this->getBanner(),
                                'multiple' => false,
                                'expanded' => false)),
        ));

        $this->setValidators(array(
            'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'name'                    => new sfValidatorString(array(
                                        'max_length' => 200,
                                        'required' => true,
                                        'trim' => true)),
            'page'                    =>  new sfValidatorChoice(array(
                                        'required' => true,
                                        'choices' => array_keys($this->getPage()),)),
            'template'                =>  new sfValidatorChoice(array(
                                        'required' => true,
                                        'choices' => array_keys($this->getTemplate()),)),
            'priority'                => new sfValidatorInteger(array(
                                        'required' => false,
                                        'trim' => true,
                                        'min' => 0, 
                                        'max' => 99999), 
                                        array(
                                        'min' => $i18n->__('Phải là số nguyên dương'),
                                        'max' => $i18n->__('Không được nhập quá 5 ký tự')
                                        )),
            'advertise_id' => new sfValidatorChoice(array(
                                'required' => false,
                                'choices' => array_keys($this->getBanner()),)),
        ));
        $this->widgetSchema['portal_id'] = new sfWidgetFormInputText(array(),array('disabled'=>'false'));
        $this->validatorSchema['portal_id'] = new sfValidatorString(array('max_length' => 25, 'required' => false,'trim'=>true));

        $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(array('model' => 'VtpAdvertiseLocation', 'column' => array('name'))));
        $this->widgetSchema->setNameFormat('vtp_advertise_location[%s]');
    }

    public function getPage() {
        $pageAttr = Attributes::getAttributesList('view_page');

        return $pageAttr;
    }

    public function getTemplate() {
        $templateAttr = Attributes::getAttributesList('advertise_template');

        return $templateAttr;
    }
    
    public function getBanner(){
        $i18n = sfContext::getInstance()->getI18N();
        $arrAdvertise= array();
        $arrAdvertise[-1]=$i18n->__('-- Chọn banner --');
        $list=VtpAdvertiseTable::getListAdvertist(sfContext::getInstance()->getUser()->getAttribute('portal',0));
        foreach ($list as $item){
            $arrAdvertise[$item->id]=$item->name;
        }
        return $arrAdvertise;
    }

    protected function doBind(array $values) {
       $values['portal_id'] = sfContext::getInstance()->getUser()->getAttribute('portal',0);
        parent::doBind($values);
    }

}
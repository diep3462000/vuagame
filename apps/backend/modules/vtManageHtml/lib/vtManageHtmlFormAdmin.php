<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 12/16/13
 * Time: 1:30 PM
 * To change this template use File | Settings | File Templates.
 */
class vtManageHtmlFormAdmin extends BaseVtpHtmlForm {

    public function configure() {
        unset($this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by'], $this['delete_at'], $this['delete_by'], $this['is_delete'], $this['module_id'], $this['portal_id']);
        $this->setWidgets(array(
            'id' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(array(), array('style' => 'width:690px')),
            'content' => new sfWidgetFormCKEditor(
                    array(
                'jsoptions' => array('toolbar' => 'Basic',
                    'width' => '700',
                    'height' => '200'),
                    )),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'prefix_path' => new sfWidgetFormChoice(array(
                'choices' => $this->getPage(),
                'multiple' => false,
                'expanded' => false
                    )),
            'slug' => new sfWidgetFormInputText(),
            'lang' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'name' => new sfValidatorString(array('max_length' => 255, 'trim' => true, 'required' => true)),
            'content' => new sfValidatorString(
                    array(
                'required' => false,
                'trim' => true,
                    )),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'prefix_path' => new sfValidatorChoice(array(
                'required' => true,
                'choices' => array_keys($this->getPage()),)),
            'slug' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 10)),
        ));

        $this->widgetSchema['portal_id'] = new sfWidgetFormInputText(array(),array('disabled'=>'false'));
        $this->validatorSchema['portal_id'] = new sfValidatorString(array('max_length' => 25, 'required' => false,'trim'=>true));

        $this->widgetSchema->setNameFormat('vtp_html[%s]');
    }

    public function getPage() {
        $i18n = sfContext::getInstance()->getI18N();
        $result = array();
        $result[''] = $i18n->__('--Chọn trang hiển thị--');
        $pageAttr = Attributes::getAttributesList('view_page');
        foreach ($pageAttr as $key => $value) {
            $result[$key] = $value;
        }

        return $result;
    }

    protected function doBind(array $values) {
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
        $values['portal_id'] = sfContext::getInstance()->getUser()->getAttribute('portal',0);

        $slug=removeSignClass::removeSign($values['name']);
        $objCat = count(VtpHtmlTable::checkSlug($slug,$values['id']));
        while ($objCat>0){
            $slug=$slug.'_'.VtHelper::generateString(5);
            $objCat = count(VtpHtmlTable::checkSlug($slug,$values['id']));
        }
        $values['slug'] = $slug;
        parent::doBind($values);
    }

}

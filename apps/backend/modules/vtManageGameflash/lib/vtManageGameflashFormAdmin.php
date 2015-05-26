<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 12/16/13
 * Time: 1:30 PM
 * To change this template use File | Settings | File Templates.
 */
class vtManageGameflashFormAdmin extends BaseGameflashForm {

    public function configure() {
        $i18n = sfContext::getInstance()->getI18N();

        $this->setWidgets(array(
                'id'          => new sfWidgetFormInputHidden(),
                'name'        => new sfWidgetFormInput(),
                'category'   => new sfWidgetFormChoice(array(
                    'choices' => $this->getType(),
                    'multiple' => false,
                    'expanded' => false
                    )),
                'description' => new sfWidgetFormCKEditor(
                    array(
                        'jsoptions' => array('toolbar' => 'Basic',
                            'width' => '700',
                            'height' => '200'))
                    ),
                'state'       => new sfWidgetFormInputCheckbox(),
                'screen'      => new sfWidgetFormInputFileEditable(array(
                    'label' => 'Ảnh đại diện',
                    'file_src' => VtHelper::getUrlImagePath(sfConfig::get('app_flash'), $this->getObject()->getScreen()),
                    'is_image' => true,
                    'edit_mode' => !$this->isNew(),
                    'template' => '<div>%file%<br />%input%</div>',
                )),
                'visit'       => new sfWidgetFormInputText(),
            ));
        $this->setWidget('flash', new sfWidgetFormInputFileEditable(
            array(
                'edit_mode' => !$this->isNew(),
                'with_delete' => false,
                'file_src' => $this->getObject()->getFlash(),
            )
        ));

            $this->setValidators(array(
                'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                'name'        => new sfValidatorString(array('max_length' => 300, 'required' => false)),
                'category'                    =>  new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array_keys($this->getType()),)),
                'description' => new sfValidatorString(array('required' => false)),
                'state'       => new sfValidatorBoolean(array('required' => false)),
                'flash'       => new sfValidatorString(array('max_length' => 3000, 'required' => false)),
                'screen'      =>           new sfValidatorFileViettel(
                        array(
                            'validated_file_class' => 'sfResizeMediumThumbnailImage',
                            'max_size' => sfConfig::get('app_image_maxsize', 5242880),
                            'mime_types' => array('image/jpeg','image/jpg', 'image/png', 'image/gif', 'image/bmp', 'image/x-windows-bmp', 'image/x-ms-bmp'),
                            'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_flash'),
                            'required' => false
                        ),
                        array(
                            'mime_types' =>  $i18n->__('Dữ liệu không hợp lệ hoặc định dạng không đúng.'),
                            'max_size' =>  $i18n->__('Tối đa 5MB')
                        )
                    ),
                'visit'       => new sfValidatorInteger(array('required' => false)),
            ));
        $this->validatorSchema['flash'] = new sfValidatorFile(
            array('required' => $this->isNew(),
                'max_size' => sfConfig::get('app_import_max_size', 20 *1024*1024),
                'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_flash'),
                'extensions'=>array('flash', 'swf'),
                'mime_types' => array('image/vnd.rn-realflash', 'application/x-shockwave-flash', 'application/octet-stream')),
            array('max_size' => $i18n->__('File upload dung lượng không quá 20MB.'),
                'mime_types' => $i18n->__('Chỉ được upload các file có định dạng flash')
            ));

            $this->widgetSchema->setNameFormat('gameflash[%s]');

            $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

            $this->setupInheritance();
    }
    public function getType() {
        $pageAttr = Attributes::getAttributesList('gameflash_type');

        return $pageAttr;
    }
}

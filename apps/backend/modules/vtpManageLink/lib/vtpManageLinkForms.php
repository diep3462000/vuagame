<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 4/24/14
 * Time: 12:02 PM
 * To change this template use File | Settings | File Templates.
 */
class vtpManageLinkForms extends BaseVtpLinkForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr=array('1'=>$i18n->__('Bài viết'),'0'=>$i18n->__('Link'),'2'=>$i18n->__('Trang'));
        unset($this['created_at'], $this['updated_at'], $this['slug'], $this['priority'],$this['lang'], $this['category_type']);
        $this->setWidgets(array(
            'id'         => new sfWidgetFormInputHidden(),
            'name'       => new sfWidgetFormInputText(),
            'group_id'   => new sfWidgetFormChoice(array(
                                'choices' => $this->getGroupLink(),
                                'multiple' => false,
                                'expanded' => false
                            )),
            'type'      => new sfWidgetFormChoice(array(
                            'choices' => $arr,
                            'multiple' => false,
                            'expanded' => false
                        ),array('onchange'=>'changeSelectLink()')),
            'link_content'       => new sfWidgetFormChoice(array(
                            'choices' => $this->getHtmlContent(),
                            'multiple' => false,
                            'expanded' => false
                        ),array()),
            'link_text'       => new sfWidgetFormInputText(array(),array('disabled'=>'disabled','style' => 'width:500px')),
            'link'       => new sfWidgetFormInputText(array(),array('disabled'=>'disabled','style' => 'width:500px')),
            'priority'   => new sfWidgetFormInputText(array('default' => 0), array('size' => 5, 'maxlength' => 5)),
            'is_active'  => new sfWidgetFormInputCheckbox(),

        ));
        
        $this->setValidators(array(
            'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'name'       => new sfValidatorString(array('max_length' => 255,'trim'=>true)),
            'group_id'   => new sfValidatorChoice(array(
                            'required' => true,
                            'choices' => array_keys($this->getGroupLink()),)),
            'type'      => new sfValidatorChoice(array(
                            'required' => true,
                            'choices' => array_keys($arr),)),
            'link_content'       => new sfValidatorChoice(array(
                            'required' => false,
                            'choices' => array_keys($this->getHtmlContent()),)),
            'link_text'       => new sfValidatorString(array('max_length' => 255, 'required' => false, 'trim'=>true)),
            'link'       => new sfValidatorString(array('max_length' => 255, 'required' => false,'trim'=>true)),
            'priority'        => new sfValidatorInteger(array('required' => false, "min"=>0, 'trim' => true),array('min'=>$i18n->__('Thứ tự phải là số nguyên dương'),'invalid'=> $i18n->__('Thứ tự phải là số nguyên dương'))),
            'is_active'  => new sfValidatorBoolean(array('required' => false)),

        ));
        $this->widgetSchema['portal_id'] = new sfWidgetFormInputText(array(),array('disabled'=>'false'));
        $this->validatorSchema['portal_id'] = new sfValidatorString(array('max_length' => 25, 'required' => false,'trim'=>true));
        $this->widgetSchema['user_type'] = new sfWidgetFormChoice(array(
            'choices' => $this->getUserType(),
            'multiple' => true,
            'expanded' => true
        ));
        $this->validatorSchema['user_type'] = new sfValidatorString(array('required' => false));

        $this->widgetSchema['page'] = new sfWidgetFormChoice(array(
            'choices' => $this->getPage(),
            'multiple' => false,
            'expanded' => false
        ),array('disabled'=>'disabled'));
        $this->validatorSchema['page'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getPage()),
        ));
        
        //ngoctv sua image_path
        $this->widgetSchema['file_path'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $this->getObject()->getFilePath()),
            'is_image' => true,
            'edit_mode' => !$this->isNew(),
            'template' => '<div>%file%<br />%input%</div>',
        ));
        $this->validatorSchema['file_path'] = new sfValidatorFileViettel(
            array(
                'validated_file_class' => 'sfResizeMediumThumbnailImage',
                'max_size' => sfConfig::get('app_image_maxsize', 999999),
                'mime_types' => array('image/jpeg','image/jpg', 'image/png', 'image/gif'),
                'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_category_images'),
                'required' => false
            ),
            array(
                'mime_types' => $i18n->__('Dữ liệu không hợp lệ hoặc định dạng không đúng.'),
                'max_size' =>  $i18n->__('Tối đa 5MB')
            )
        );
        
        $this->widgetSchema['category_type'] = new sfWidgetFormChoice(array(
            'choices' => $this->getCategory(),
            'multiple' => false,
            'expanded' => true));
        
        $this->validatorSchema['category_type'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->getCategory()),
            'required' => false
        ));

        $this->widgetSchema->setNameFormat('vtp_link[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    public function getGroupLink() {
        $i18n = sfContext::getInstance()->getI18N();
        $result=array();
        $result['']=$i18n->__('--Chọn nhóm liên kết--');
        $pageAttr = Attributes::getAttributesList('link_group');
        foreach ($pageAttr as $key=>$value){
            $result[$key]=$value;
        }

        return $result;
    }

    public function getUserType() {
        $result = Attributes::getAttributesList('type_account');
        return $result;
    }

    public function getHtmlContent()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $result=array();
        $result['']=$i18n->__('--Chọn bài viết nội dung--');
        $lstHtml=VtpHtmlTable::getAllHtml(sfContext::getInstance()->getUser()->getCulture(),sfContext::getInstance()->getUser()->getAttribute('portal',0));
        foreach ($lstHtml as $item){
            $link= '@'.$item->prefix_path .'?slug='.$item->slug;
            $result[$link]=$item->getName();
        }
        return $result;
    }

    private function doBindItem(&$values) {

        $total = '';
        if (isset($values['user_type']) && is_array($values['user_type'])) {
            foreach ($values['user_type'] as $key=> $val) {
                $total = $total . $val . ',';
            }
            $values['user_type'] = $total;
        }

        $item = $values['type'];
        $strItem="";
        if ($item=='1'){
            $strItem=$values['link_content'];
        }elseif ($item=='0'){
            $strItem=trim($values['link_text']);
        }
//        var_dump($strItem); die;
        if (strlen($strItem) < 256)
            $values['link'] = $strItem;
        $values['name']=trim($values['name']);
        return $strItem;
    }

    protected function doBind(array $values) {
        $values['portal_id'] = sfContext::getInstance()->getUser()->getAttribute('portal',0);
        $this->doBindItem($values);
        parent::doBind($values);
    }
    
    public function getPage() {
        $i18n = sfContext::getInstance()->getI18N();
        $result=array();
        $result['']=$i18n->__('--Chọn trang hiển thị--');
        if (sfContext::getInstance()->getUser()->getAttribute('portal', 0) == 1) {
            $pageAttr = Attributes::getAttributesList('view_page_dn');

        } else {
            $pageAttr = Attributes::getAttributesList('view_page');
        }

        foreach ($pageAttr as $key=>$value){
            $result[$key]=$value;
        }

        return $result;
    }
    
    public function getCategory(){
        $i18n = sfContext::getInstance()->getI18N();
        return array(
            1=>$i18n->__('Chuyên mục dịch vụ'),
            2=>$i18n->__('Chuyên mục tin tức')
        );
    }

    public function getCurrentUserType() {
        $arrUserType = VtpLinkTypeUserTable::getUserTypeByLink($this->object->getId());
        $strType='';
        foreach ($arrUserType as $type){
            $strType = $strType . $type->user_type . ',';
        }
        $result = array();
        if ($strType!=''){
            if(VtHelper::endsWith($strType,',')){
                $strType= substr($strType, 0 ,strlen($strType)-1);
            }
            $arrPer= explode( ',',$strType);
            $choices = $this->getUserType();

            if (!empty($choices)) {
                foreach ($choices as $key => $choice) {
                    foreach ($arrPer as $type){
                        if($key==$type){
                            $result[] = $key;
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function updateDefaultsFromObject() {
        parent::updateDefaultsFromObject();
        $this->setDefault('user_type', $this->getCurrentUserType());
    }
}
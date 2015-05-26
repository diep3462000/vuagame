<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageArticlesFormAdmin
 *
 * @author ngoctv1
 */
class vtManageArticlesFormAdmin extends BaseVtpArticleForm
{
  public function configure()
  {
      $i18n = sfContext::getInstance()->getI18N();
      $this->setWidgets(array(
          'id'             => new sfWidgetFormInputHidden(),
          'title'          => new sfWidgetFormTextarea(),
          'alttitle'       => new sfWidgetFormInputText(),
          'header'         => new sfWidgetFormTextarea(),
          'body'           => new sfWidgetFormCKEditor(
              array(
                  'jsoptions' => array('toolbar' => 'Basic',
                      'width' => '700',
                      'height' => '200'),
              )),
          'image_path'     => new sfWidgetFormInputFileEditable(array(
              'label' => ' ',
              'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_article_images'), $this->getObject()->getImagePath()),
              'is_image' => true,
              'edit_mode' => !$this->isNew(),
              'template' => '<div>%file%<br />%input%</div>',
          )),
          'priority'       => new sfWidgetFormInputText(),
          'published_time' => new sfWidgetFormVnDatePicker(array(),array('readonly'=>true)),
          'meta'           => new sfWidgetFormInputText(),
          'keywords'       => new sfWidgetFormInputText(),
          'author'         => new sfWidgetFormInputText(),
          'is_active'      => new sfWidgetFormChoice(array(
              'choices' => $this->getStatus(),
              'multiple' => false,
              'expanded' => false)),
          'is_hot'         => new sfWidgetFormInputCheckbox(),
          'is_delete'      => new sfWidgetFormInputCheckbox(),
          'delete_by'      => new sfWidgetFormInputText(),
          'delete_at'      => new sfWidgetFormDateTime(),
      ));

      $this->setValidators(array(
          'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
          'title'          => new sfValidatorString(array('max_length' => 512)),
          'alttitle'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'header'         => new sfValidatorString(array('required' => false)),
          'body'           =>  new sfValidatorString(
              array(
                  'required' => false,
                  'trim' => true,
              )),
          'image_path'     =>  new sfValidatorFileViettel(
              array(
                  'validated_file_class' => 'sfResizeMediumThumbnailImage',
                  'max_size' => sfConfig::get('app_image_maxsize', 999999),
                  'mime_types' => array('image/jpeg','image/jpg', 'image/png', 'image/gif'),
                  'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_article_images'),
                  'required' => false
              ),
              array(
                  'mime_types' => $i18n->__('Chỉ được upload các file có định dạng .jpg, .gif, .png'),
                  'max_size' => $i18n->__('Dung lượng tối đa 5MB'),
                  'invalid' => $i18n->__('Chỉ được upload các file có định dạng .jpg, .gif, .png')
              )),
          'priority'       => new sfValidatorInteger(),
          'published_time' => new sfValidatorDateTime(array('required' => false)),
          'meta'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'keywords'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'author'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          'is_active'      => new sfValidatorChoice(array(
              'required' => false,
              'choices' => array_keys($this->getStatus()),)),
          'is_hot'         => new sfValidatorBoolean(array('required' => false)),
          'is_delete'      => new sfValidatorBoolean(array('required' => false)),
          'delete_by'      => new sfValidatorInteger(array('required' => false)),
          'delete_at'      => new sfValidatorDateTime(array('required' => false)),
      ));

      $this->validatorSchema->setPostValidator(
          new sfValidatorDoctrineUnique(array('model' => 'VtpArticle', 'column' => array('slug')))
      );

      $this->widgetSchema->setNameFormat('vtp_article[%s]');

      $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

      $this->setupInheritance();
  }

  protected function getStatus()
  {
      $i18n = sfContext::getInstance()->getI18N();
      $arrStatus=array();
      $arrStatus['-1']=$i18n->__('Bản nháp');
      if(sfContext::getInstance()->getUser()->isSuperAdmin()|| sfContext::getInstance()->getUser()->hasCredential('admin'))
      {
          $arrStatus['0']=$i18n->__('Chờ duyệt');
          $arrStatus['1']=$i18n->__('Phê duyệt');
          $arrStatus['2']=$i18n->__('Đăng bài');
      }else{

          if(sfContext::getInstance()->getUser()->hasCredential('news_editor')){
              $arrStatus['0']=$i18n->__('Chờ duyệt');
          }
          if(sfContext::getInstance()->getUser()->hasCredential('news_approved')){
              $arrStatus['1']=$i18n->__('Phê duyệt');
          }
          if(sfContext::getInstance()->getUser()->hasCredential('news_public')){
              $arrStatus['2']=$i18n->__('Đăng bài');
          }
      }
      return $arrStatus;
  }
  protected function getParentByType(){
      if(sfContext::getInstance()->getUser()->isSuperAdmin() || sfContext::getInstance()->getUser()->hasCredential('admin')){
          $result=VtpCategoryTable::getCategoryByType('N',sfContext::getInstance()->getUser()->getAttribute('portal',0), '');
          return $result;
      }else{
          $result=VtpCategoryTable::getCategoryByPermission(sfContext::getInstance()->getUser()->getUserPermission(),'N',sfContext::getInstance()->getUser()->getAttribute('portal',0));

          return $result;
      }
    }
    



    private function doBindItem(&$values) {
        if (empty($values['item_list']))
            return;
        $item = $values['item_list'];
        $strItem="";
        if (is_array($item)){
            foreach ($item as $val) {
                $strItem =$strItem . $val . ',';
            }
        }
        // kiem tra xem ket thuc chuoi co phai la ',' khong, neu dung thi thuc hien replace di
        if(VtHelper::endsWith($strItem,',')){
            $strItem= substr($strItem, 0 ,strlen($strItem)-1);
        }
        //var_dump($strItem); die;
        $values['item_list'] = $strItem;
        return $strItem;
    }

    public function checkValidator($validator, $values){
        //
        $i18n = sfContext::getInstance()->getI18N();
        $error1="";

        if ($values['published_time']!= null && $values['expiredate_time']!= null){
            if (strtotime($values['published_time']) > strtotime($values['expiredate_time'])){
                $error1 = new sfValidatorError($validator,$i18n->__('Ngày đăng bài phải nhỏ hơn ngày kết thúc.'));
            }
        }
        if($error1!=""){
            throw new sfValidatorErrorSchema($validator, array('expiredate_time' => $error1));
        }
        return $values;
    }
}

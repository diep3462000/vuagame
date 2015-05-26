<?php 
    $request=  sfContext::getInstance()->getRequest();
?>
<td class="sf_admin_text sf_admin_list_td_name" field="name" title="<?php echo $vtp_photo->getName(); ?>">
      <?php 
            echo  link_to(VtHelper::truncate($vtp_photo->getName(), 50, '...', true),'vtp_photo_edit',array('id'=>$vtp_photo->getId(),'default_album_id'=>$vtp_album->getId()));
      ?>
  </td>      
  <td class="sf_admin_text sf_admin_list_td_file_path" field="file_path" style="text-align: center;">
      <?php  echo '<img align="middle" src="' . VtHelper::getUrlImagePathThumb(sfConfig::get('app_album_images'), $vtp_photo->getFilePath()) . '"/>';?>
  </td>      
  <td class="sf_admin_foreignkey sf_admin_list_td_album_id" field="album_id"><?php echo  VtHelper::truncate(VtpAlbumTable::getALbumById($vtp_photo->getAlbumId())->getName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_priority" field="priority" style="text-align: center;"><?php echo  VtHelper::truncate($vtp_photo->getPriority(), 50, '...', true)  ?></td>      
  <td class="sf_admin_boolean sf_admin_list_td_is_active" field="is_active" style="text-align: center;"><?php echo get_partial('vtpManagePhoto/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_photo->getIsActive(), 50, '...', true) )) ?></td>    
  
  <td class="sf_admin_text sf_admin_list_td_name" field="name" title="<?php echo  $vtp_album->getName()  ?>">
      <?php echo  link_to(VtHelper::truncate($vtp_album->getName(), 50, '...', true),'vtp_album_edit',$vtp_album)  ?>
  </td>      
  <td class="sf_admin_date sf_admin_list_td_event_date" field="event_date" style="text-align: center;"><?php echo  VtHelper::truncate(VtHelper::reFormatDate($vtp_album->getEventDate(), "d-m-Y" ), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_priority" field="priority" style="text-align: center;"><?php echo  VtHelper::truncate($vtp_album->getPriority(), 50, '...', true)  ?></td>      
  <td class="sf_admin_boolean sf_admin_list_td_is_active" field="is_active" style="text-align: center;"><?php echo get_partial('vtpManageAlbum/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_album->getIsActive(), 50, '...', true) )) ?></td>    
  
  <td class="sf_admin_text sf_admin_list_td_file_path" field="file_path">
      <?php echo get_partial('vtpManageLink/image_path', array('type' => 'list', 'vtp_link' => $vtp_link)) ?>
  </td>
  <td class="sf_admin_text sf_admin_list_td_name" field="name" title="<?php echo $vtp_link->getName(); ?>">
      <?php echo link_to(VtHelper::truncate($vtp_link->getName(), 50, '...', true),'vtp_link_edit',$vtp_link) ?></td>
  <td class="sf_admin_text sf_admin_list_td_group_id" field="group_id">
      <?php
            $pageAttr = Attributes::getAttributesList('link_group');
            echo $pageAttr[$vtp_link->getGroupId()];
      ?>
  </td>
  <td title="<?php echo $vtp_link->getLink(); ?>">
      <?php echo VtHelper::truncate($vtp_link->getLink(), 50, '...', true) ?>
  </td>
  <td class="sf_admin_text sf_admin_list_td_priority" field="priority"><?php echo  VtHelper::truncate($vtp_link->getPriority(), 50, '...', true)  ?></td>      
  <td class="sf_admin_boolean sf_admin_list_td_is_active" field="is_active"><?php echo get_partial('vtpManageLink/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_link->getIsActive(), 50, '...', true) )) ?></td>    

  <td class="sf_admin_text sf_admin_list_td_name" field="name" title="<?php echo $vtp_advertise_location->getName(); ?>">
      <?php echo link_to(VtHelper::truncate($vtp_advertise_location->getName(), 50, '...', true),'vtp_advertise_location_edit',$vtp_advertise_location)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_page" field="page">
      <?php
      echo  vtManageAdvertiseLocationActions::getAliasPageAttribute($vtp_advertise_location->getPage())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_template" field="template">
      <?php echo  vtManageAdvertiseLocationActions::getAliasTemplateAttribute($vtp_advertise_location->getTemplate())  ?></td>
  <td class="sf_admin_text sf_admin_list_td_priority" field="priority" style="text-align: center"><?php echo  VtHelper::truncate($vtp_advertise_location->getPriority(), 50, '...', true)  ?></td>
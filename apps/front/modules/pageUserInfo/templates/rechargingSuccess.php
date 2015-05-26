<!-- Header -->
<?php include_partial('common/menuHomePage', array('mdl' => $mdl)); ?>
<!-- /Header -->
<?php include_partial('pagePublisherInfo/menuAccount', array('mdl' => $mdl)); ?>
<!-- Content 2 -->
<?php include_partial('pagePublisherInfo/form_recharging', array('form'=> $form, 'money'=>$money)) ?>

<div class="left-user">

    <div style="display:inline-block;width:100%;botder:1px solid red">
        <span class="title-user"><?php echo $g_user->getUsername();?></span>
        <img src="/media/newAvatars/f/avatar_1.png" width="100" height="100" class="large-img" alt="">
    </div>
    <span class="detail-info even">User: <b><?php echo $g_user->getUsername();?></b></span>
    <?php if($user):?>
    <span class="detail-info odd">Email: <b><?php echo $user->getEmail()?></b></span>
    <span class="detail-info even">Họ tên: <b><?php echo $user->getFullname()?></b></span>
    <?php endif ?>
    <span class="detail-info odd">Cấp độ : <b><?php echo $g_user->getNameLevel()?></b></span>
    <span class="detail-info even">Mi: <b><?php echo number_format($g_user->getGameCash())?> Mi</b></span>
</div>
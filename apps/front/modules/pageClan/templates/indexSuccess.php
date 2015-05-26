<div class="content divclear">
    <div class="left-user">

        <?php
        $form = new BaseForm();
        if ($form->isCSRFProtected()):?>
            <input type="hidden" id='ajax_token' value="<?php echo $form->getCSRFToken() ?>" />
        <?php endif; ?>
        <ul class="all-team">
        </ul>

    </div>
    <div class="right-user">
        <h3>Thich La Chien</h3>
        <div class="team-overview">
            <img src="http://gamevina.com/skin/images/icons/smallavatar.png" width="120" height="120" alt="">
            <div class="intro">
                <p class="even"><img src="http://gamevina.com/skin/images/ranks.png" width="14" height="14" alt=""> Cấp độ: <b>7</b></p>
                <p><img src="http://gamevina.com/skin/images/profile/mi.png" width="14" height="14" alt=""> Quỹ bang: <b>10.150.004 Mi</b></p>
                <p class="even">
                    <img src="http://gamevina.com/skin/images/clans/boss.png" width="14" height="14" alt="">
                    Bang chủ: <b>nguyenlinhphat2007</b>
                </p>
                <p style="height:100px;width:562px;margin-top:5px;">ai cam mua mi thi alo bang chu ngay nhe.100k 10trieu mi</p>
            </div>

            <div class="intro">
                <p class="even">
                    <img src="http://gamevina.com/skin/images/clans/total_member.png" width="14" height="14" alt="">
                    Tổng số thành viên: <b>110 người</b>
                </p>
                <p>
                    <img src="http://gamevina.com/skin/images/clans/curren_member.png" width="14" height="14" alt="">
                    Số thành viên: <b>0 người</b>
                </p>
                <p class="even">
                    <img src="http://gamevina.com/skin/images/clans/add_member.png" width="14" height="14" alt="">
                    Có thể nhận thêm: <b>110 người</b>
                </p>
            </div>

        </div>

        <div class="list-mem">
            <strong class="tit">Danh sách thành viên</strong>
            <ul class="member-item">
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        changePagination('0');
    });
    function changePagination(pageId) {
        var csrf_value = $("#ajax_token").val();
        var url = '<?php echo url_for('ajax_load_clan_list_pagination') ?>';
        $.ajax({
            type: "POST",
            url: url,
            data: 'pageId='+pageId+"&token="+csrf_value,
            cache: false,
            success: function (result) {
                $(".all-team").html(result);
            }
        });
    }
</script>
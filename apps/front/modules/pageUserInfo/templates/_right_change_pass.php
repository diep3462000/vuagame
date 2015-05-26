<div class="right-user">
    <h3>Thay đổi mật khẩu</h3>
    <form action="http://vuabai888.com/user/update_info" method="post" id="frm-register" accept-charset="utf-8" class="user-form">
        <input type="hidden" name="tab" value="changepass">



        <div class="line">
            <span>Mật khẩu cũ</span>
            <input type="password" name="old_password" value="" class="validate[required]" placeholder="Nhập mật khẩu cũ...">
        </div>
        <div class="line">
            <span>Mật khẩu mới</span>
            <input type="password" name="password" id="password" value="" class="validate[required,equals[retype_password],minSize[6]]" placeholder="Nhập mật khẩu mới...">
        </div>

        <div class="line">
            <span>Nhập lại mật khẩu mới</span>
            <input type="password" id="retype_password" class="validate[required,equals[password],minSize[6]]" value="" placeholder="Nhập lại mật khẩu mới...">
        </div>
        <div class="line">
            <center><button type="submit">Cập nhật</button></center>
        </div>
    </form>
</div>
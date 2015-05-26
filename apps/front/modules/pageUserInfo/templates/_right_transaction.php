<div class="right-user">
    <h3>Thay đổi hồ sơ</h3>
    <form action="http://vuabai888.com/user/update_info" method="post" id="frm-register" accept-charset="utf-8" class="user-form">
        <input type="hidden" name="tab" value="edit">


        <strong>Thông tin cá nhân <img src="/skin/images/infoline.png" alt=""></strong>
        <div class="line">
            <span>Tên hiển thị</span>
            <input type="text" name="fullname" value="1231" placeholder="Nhập tên hiển thị...">
        </div>
        <div class="line">
            <span>Năm sinh</span>
            <input type="text" name="birth" class="birth-date" value="23123" placeholder="Nhập năm sinh...">
        </div>

        <div class="line">
            <span>Giới tính</span>
            <label><input type="radio" name="sex" id="1" value="1" class="validate[required] radio"> Nam</label>
            <label><input type="radio" name="sex" id="2" value="0" class="validate[required] radio" checked=""> Nữ</label>
        </div>
        <label class="mess">
            <font size="3">Bạn chưa có số CMND?</font>
            <p>Nếu bạn chưa có số CMND thì bạn sẽ không có cơ hội tham gia các sự kiện thi đấu hoặc không được nhận những món quà hiện vật từ ban tổ chức</p>
        </label>
        <div class="line">
            <span>Số CMND</span>
            <input type="text" name="identity" value="" class="validate[custom[integer]]" placeholder="Nhập số chứng minh thư...">
        </div>

        <div class="line">
            <span>Email <b>(*)</b></span>
            <input type="text" value="diep@yahoo.com" name="email" class="validate[required,custom[email]]" placeholder="Nhập Email...">
        </div>

        <div class="line">
            <span>Số điện thoại <b>(*)</b></span>
            <input type="text" name="mobile" class="validate[custom[phone],required]" value="12312312" placeholder="Nhập số điện thoại...">
        </div>

        <div class="line">
            <span>Địa chỉ</span>
            <input type="text" name="address" value="" placeholder="Nhập địa chỉ...">
        </div>
        <div class="line">
            <center><button type="submit">Cập nhật</button></center>
        </div>
    </form>				</div>
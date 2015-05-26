<div class="right-user">

    <script type="text/javascript">
        $(function(){
            $('.buy-avatar').click(function(){
                var avatar_id	=	$(this).attr('id');
                x				=	confirm('Bạn muôn mua avatar này?');
                if(x){
                    $('#avatar_id').val(avatar_id);
                    $('#frm-register').submit();
                }
            })
        })
    </script>
    <h3>Danh sách bạn bè</h3>
    <form action="http://vuabai888.com/user/update_info" method="post" id="frm-register" accept-charset="utf-8" class="user-form">
        <input type="hidden" name="tab" value="friends">
        <input type="hidden" name="avatar_id" id="avatar_id" value="">


        <div class="contain-shop-list">
            <ul class="list-avatar">
                <li>
                    <a href="http://vuabai888.com/user/detail/12">
                        <img src="/media/newAvatars/f/avatar_1.png" width="100px" height="100px" alt="">
                    </a>
						<span>
							kyvuong 
						</span>
                    <span><b style="color: yellow">2.700 Mi</b></span>
                    <span style="color: white">Số lần chơi:1</span>
                </li>
            </ul>

            <div class="paging divclear">
            </div>
        </div>
    </form>				</div>
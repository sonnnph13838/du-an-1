
	    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
	    <script src="demoValidation.js" type="text/javascript"></script>
	    <style>
		label.error{
			color: red;
		}
	    </style>
<div class="mgt-dn cnter mg-fterr">
<div class="wrapper form-dn">
    <h3>Đăng nhập</h3>
    <?php
		if (isset($_GET['msg']) && ($_GET['msg']) != "")
			echo "<h3>" . $_GET['msg'] . "</h3>"
		?>
    <form action="post-login" id="dangnhap" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="email" name="email" placeholder="Email Address">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
      </div>

      <div class="field password">
        <div class="input-area">
          <input type="password" name="mat_khau" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
      </div>


      <div class="remember">
          <input type="checkbox" name="" id="" class="check-remember"> Ghi nhớ tài khoản
      </div>
      <div class="pass-txt"><a href="<?= BASE_URL .'quen-mk'?>">Quên mật khẩu</a></div>
      <input type="submit" name="dangnhap" value="Đăng nhập">
    </form>
    <div class="sign-txt">Bạn chưa có tài khoản? <a href="client-dangki">Đăng kí ngay</a></div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {

	//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
	$("#dangnhap").validate({
		rules: {

			email: {
				required: true,
				email: true
			},
			mat_khau: {
				required: true,
				minlength: 6,
				maxlength: 15
			},

		},
		messages: {
			email: {
				required: "Vui lòng nhập vào email",
				email: "Nhập đúng định dạng email đê :D"
			},
			mat_khau: {
				required: "Vui lòng nhập mật khẩu!",
				minlength: "Độ dài tối thiểu 6 kí tự",
				maxlength: "Độ tài tối đa 15 kí tự"
			},
		}
	});
});
</script>
<!-- <form method="post" action="postdk">
	<div>
		Họ Tên: <input type="text" name="name">
	</div>
	<br>
	<div>
		Tài khoản: <input type="text" name="taikhoan">
	</div>
	<br>
	<div>
		Mật Khẩu: <input type="password" name="matkhau">
	</div>
	<br>
	<div>
		Email: <input type="text" name="email">
	</div>
	<br>
	<div>
		Địa chỉ: <input type="text" name="diachi">
	</div>
	<br>
	<div>
		Số điện thoại: <input type="text" name="sdt">
	</div>
	<input type="submit" value="Đăng kí" name="dangki">
</form> -->
<!-- From có css -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="demoValidation.js" type="text/javascript"></script>
<div class="mgt-dn cnter mg-fterr">
	<div class="wrapper">
		<?php if (isset($_GET['msg']) && ($_GET['msg'] != "")) : ?>
		<div class="msg-quenmk">
			<h4><?= $_GET['msg'] ?></h4>
		</div>
		<?php endif ?>
		<div class="forgot-pass">
			<h3>Đăng kí</h3>
			<form action="postdk" method="post" id="demoForm">
				<div class="field email">
					<div class="input-area">
						<input type="email" placeholder="Email" name="email">
						<i class="icon fas fa-envelope"></i>
					</div>
				</div>
				<div class="field password">
					<div class="input-area">
						<input type="password" id="matkhau" placeholder="Mật khẩu" name="matkhau">
						<i class="icon fas fa-lock"></i>
					</div>
				</div>
				<div class="field password">
					<div class="input-area">
						<input type="password" id="matkhau2" placeholder="Nhập Lại Mật khẩu" name="matkhau2">
						<i class="icon fas fa-lock"></i>
					</div>
				</div>
				<div class="field password">
					<div class="input-area">
						<input type="text" placeholder="Địa chỉ" name="diachi">
						<i class="icon fas fa-map-marker-alt"></i>
					</div>
				</div>
				<div class="field password">
					<div class="input-area">
						<input type="text" placeholder="SĐT" name="sdt">
						<i class="icon fas fa-phone-alt"></i>
					</div>
				</div>
				<input type="submit" value="Đăng Kí" name="dangki">
			</form>
			<div class="sign-txt">Bạn đã có tài khoản? <a href="dang-nhap">Đăng nhập ngay</a></div>

		</div>
	</div>
</div>
<script>
$().ready(function() {
	$("#demoForm").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"email": {
				required: true,
				maxlength: 15
			},
			"matkhau": {
				required: true,
				minlength: 8
			},
			"matkhau2": {
				equalTo: "#matkhau",
				minlength: 8
			},
			"diachi": {
				required: true,
				maxlength: 15
			},
			"sdt": {
				required: true,
				maxlength: 15
			},
		}
	});
});
</script>
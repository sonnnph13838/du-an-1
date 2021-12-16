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
<div class="mgt-dn cnter mg-fterr">
	<div class="wrapper">
		<?php if (isset($_GET['msg']) && ($_GET['msg'] != "")) : ?>
		<div class="msg-quenmk">
			<h4><?= $_GET['msg'] ?></h4>
		</div>
		<?php endif ?>
		<div class="forgot-pass">
			<h3>Đăng kí</h3>
			<form action="postdk" id="dangky" method="post">
				<div class="field email">
					<div class="input-area">
						<input type="email" id="email" placeholder="Email" name="email">
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
<script type="text/javascript">
$(document).ready(function() {

	//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
	$("#dangky").validate({
		rules: {

			email: {
				required: true,
				email: true
			},
			matkhau: {
				required: true,
				minlength: 6,
				maxlength: 15
			},
			matkhau2: {
				required: true,
				minlength: 6,
				maxlength: 15,
				equalTo: "#matkhau"
			},
			diachi: {
				required: true,
			},
			sdt: {
				required: true,
				maxlength: 11,
				minlength: 1,
			},

		},
		messages: {
			email: {
				required: "Vui lòng nhập vào email",
				email: "Nhập đúng định dạng email đê :D"
			},
			matkhau: {
				required: "Vui lòng nhập mật khẩu!",
				minlength: "Độ dài tối thiểu 6 kí tự",
				maxlength: "Độ tài tối đa 15 kí tự"
			},
			matkhau2: {
				required: "Vui lòng nhập lại mật khẩu!",
				equalTo: "Hai mật khẩu phải giống nhau",
				minlength: "Độ dài tối thiểu 6 kí tự",
				maxlength: "Độ tài tối đa 15 kí tự"
			},
			sdt: {
				required: "Vui lòng nhập vui lòng nhập số điện thoại!",
				minlength: "Vui lòng nhập đủ 10 số",
				maxlength: "Vui lòng nhập đủ 10 số"
			},
			diachi: {
				required: "Vui lòng nhập địa chỉ!",

			},
		}
	});
});
</script>
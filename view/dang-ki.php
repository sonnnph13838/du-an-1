<!-- <form method="post" action="post-dang-ki.php">
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
<div class="container white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3 class="h3 color-red text-uppercase text-center mt-120 mb-80">
				-Đăng ký
			</h3>
			<form class="form-horizontal form-register" role="form" method="POST" action="post-dang-ki.php">
				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Họ Và Tên <span class="red">(*)</span>
					</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="hoten" value="" autofocus />
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Tên đăng nhập <span class="red">(*)</span>
					</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="taikhoan" value="" autofocus />
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-md-4 control-label">SĐT <span class="red">(*)</span></label>
					<div class="col-md-8">
						<input id="phone" type="text" class="form-control" name="sdt" value="" autofocus />
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-md-4 control-label">Email <span class="red">(*)</span></label>
					<div class="col-md-8">
						<input id="email" type="email" class="form-control" name="email" value="" />
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-4 control-label">Mật khẩu <span class="red">(*)</span></label>
					<div class="col-md-8">
						<input id="password" type="password" class="form-control" name="matkhau" />
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Địa chỉ <span class="red">(*)</span>
					</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="diachi" value="" autofocus />
					</div>
				</div>
				<div class="form-group mb-40">

					<div class="col-md-6 text-right">
						<input type="submit" value="Đăng kí" name="dangki">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
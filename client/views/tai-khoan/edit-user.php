<?php

 if(isset($_session['email'])&&(is_array($_session['email']))){
	 extract($_session['email']);
	 
}
?>
<div class="mgt-dn cnter">
	<div class="wrapper">
		<h3>Sửa tài khoản</h3>
		<form action="update-user" method="post">
            <input type="hidden" name="id" value = "<?=$id_user?>" >
			<div class="field email">
				<div class="input-area">
					<input type="text" placeholder="Tài khoản" name="taikhoan" value = "<?=$name_user ?>">
					<i class="icon fas fa-envelope"></i>
				</div>
			</div>
			<div class="field email">
				<div class="input-area">
					<input type="email" placeholder="Email" name="email" value = "<?=$email ?>">
					<i class="icon fas fa-envelope"></i>
				</div>
			</div>
			<div class="field password">
				<div class="input-area">
					<input type="password" placeholder="Mật khẩu" name="matkhau" value = "<?=$password ?>">
					<i class="icon fas fa-lock"></i>
				</div>
			</div>
			
			<div class="field password">
				<div class="input-area">
					<input type="text" placeholder="Địa chỉ" name="diachi" value = "<?=$address ?>">
					<i class="icon fas fa-map-marker-alt"></i>
				</div>
			</div>
			<div class="field password">
				<div class="input-area">
					<input type="text" placeholder="SĐT" name="sdt" value = "<?=$tel ?>">
					<i class="icon fas fa-phone-alt"></i>
				</div>
			</div>
			<input  type="submit"  value="Cập nhật" name="capnhat" >
		</form>
		
		<?php
		if (isset($_GET['msg']) && ($_GET['msg']) != "")
			echo "<h3>" . $_GET['msg'] . "</h3>"
		?>

	</div>
</div>
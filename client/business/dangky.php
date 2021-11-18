<?php
require_once '././dao/user.php';
function formdk()
{
	clien_dk('layout/form/formdk.php');
}

function postdk()
{
	if (isset($_POST['dangki']) && ($_POST['dangki'])) {
		$hoten = $_POST['name'];
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		insert_nguoidung($taikhoan, $matkhau, $email, $diachi, $sdt);
		$thongbao = "Đăng kí thành công. Vui lòng đăng nhập để  thực hiện các chức năng!!";
		echo "$thongbao";
	}
}
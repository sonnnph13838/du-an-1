<?php
require_once '././dao/user.php';
function formdk()
{
	clien_dk('tai-khoan/dang-ki.php');
}

function postdk()
{
	if (isset($_POST['dangki']) && ($_POST['dangki'])) {
		// $hoten = $_POST['name'];
		// $taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		insert_nguoidung($matkhau, $email, $diachi, $sdt);
		header('location: ./dang-ki&msg= Đăng kí thành công. Vui lòng đăng nhập để  thực hiện các chức năng!!
		');
	}
}
<?php
require_once './dao/system_dao.php';
function insert_nguoidung($matkhau, $email, $diachi, $sdt)
{
	$sql = "INSERT INTO nguoi_dung(mat_khau,email,dia_chi,sdt) values ('$matkhau','$email','$diachi','$sdt')";
	pdo_execute($sql);
}
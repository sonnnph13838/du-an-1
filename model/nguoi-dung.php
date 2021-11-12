<?php

function insert_nguoidung($taikhoan, $matkhau, $email, $diachi, $sdt)
{
	$sql = "INSERT INTO nguoi_dung(tai_khoan,mat_khau,email,dia_chi,sdt) values ('$taikhoan','$matkhau','$email','$diachi','$sdt')";
	pdo_execute($sql);
}
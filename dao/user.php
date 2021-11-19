<?php
function insert_nguoidung($matkhau, $email, $diachi, $sdt)
{
	$sql = "INSERT INTO nguoi_dung(mat_khau,email,dia_chi,sdt) values ('$matkhau','$email','$diachi','$sdt')";
	pdo_execute($sql);
}

function checkEmail($email)
{
    $sql = "select * from nguoi_dung where email = '$email'";
    $dataEmail = executeQuery($sql, false);
    return $dataEmail;
}


function quenmk($email, $pass)
{
    $sql = "update nguoi_dung set mat_khau = '$pass' where email = '$email'";
    executeQuery($sql, false);
}


function list_users()
{
    $sql = "SELECT * from nguoi_dung order by id desc";
    $ds_nguoi_dung =  pdo_query($sql);
    return $ds_nguoi_dung;
}
function del_user()
{
    $sql = "DELETE from nguoi_dung where id =" . $_GET['id'];
    pdo_execute($sql);
}

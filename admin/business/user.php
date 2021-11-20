<?php
require_once './dao/system_dao.php';
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
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $sql = "SELECT * from nguoi_dung where email like '%$keyword%'";
    $list_user =  pdo_query($sql);
    admin_render(
        'user/list_user.php',
        compact('list_user', 'keyword'),
        'admin-assets/custom/category_index.js'
    );
}
function edit_user()
{
    admin_render(
        'user/update_role.php',
        []
    );
}
function update_roles()
{
    $id = $_POST['id'];
    $role = $_POST['role'];
    if ($role == 0) {
        $sql = "UPDATE nguoi_dung SET vai_tro = 0 where  id = '$id'";
        pdo_execute($sql);
    } elseif ($role == 1) {
        $sql = "UPDATE nguoi_dung SET vai_tro = 1 where  id =  '$id'";
        pdo_execute($sql);
    }
    header('Location: ../admin-user');
}
function del_user()
{
    $sql = "DELETE from nguoi_dung where id =" . $_GET['id'];
    pdo_execute($sql);
}

<?php
require_once './dao/system_dao.php';
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
function edit_role()
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
    header('Location: '. ADMIN_URL . 'user');
}
function del_user()
{
    $sql = "DELETE from nguoi_dung where id =" . $_GET['id'];
    pdo_execute($sql);
    header('Location: '. ADMIN_URL . 'user');
}

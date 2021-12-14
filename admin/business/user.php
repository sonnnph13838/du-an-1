<?php
require_once './dao/system_dao.php';
function list_users()
{
    $loc = isset($_GET['loc']) ? $_GET['loc'] : "";
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $sql = "SELECT * from user";
    if ($loc == 0) {
        $sql .= "  where  role = 0 ";
    } elseif ($loc == 1) {
        $sql .= "  where  role = 1 ";
    } elseif ($keyword > 0) {
        $sql .= "  where  email like '%$keyword%' ";
    }
    $list_user =  pdo_query($sql);
    admin_render(
        'user/list_user.php',
        compact('list_user', 'keyword'),
        'admin-assets/custom/category_index.js'
    );
}
function edit_user()
{
    $sql = "SELECT * from user where id_user=" . $_GET['id'];
    $list_user = executeQuery($sql);
    admin_render(
        'user/update_user.php',
        compact('list_user')
    );
}
function  update_user()
{

    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];
    $target_dir = 'public/client-assets/dist/images/';
    $target_file = $target_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES['hinh']['name'])). " has been uploaded.";
    }
    if ($role == 0) {
        $sql = "UPDATE user set name_user = '$name', image = '$image', email = '$email', address = '$address', tel = '$tel', role = 0 where id_user = $id";
    } elseif ($role == 1) {
        $sql = "UPDATE user set name_user = '$name', image = '$image', email = '$email', address = '$address', tel = '$tel', role = 1 where id_user = $id";
    }
    if ($image != "") {
        $sql = "UPDATE user set name_user = '$name', image = '$image', email = '$email', address = '$address', tel = '$tel', role = '$role' where id_user = $id";
    } else {
        $sql = "UPDATE user set name_user = '$name', email = '$email', address = '$address', tel = '$tel', role = '$role' where id_user = $id";
    }
    executeQuery($sql);
    header('Location: ' . ADMIN_URL . 'user');
}
function del_user()
{
    $sql = "DELETE from user where id_user =" . $_GET['id'];
    pdo_execute($sql);
    header('Location: ' . ADMIN_URL . 'user');
}

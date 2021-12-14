<?php
function list_option()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $sql = "SELECT * from option where name_option like '%$keyword%'";
    $list_option = executeQuery($sql);
    admin_render(
        'option/list_option.php',
        compact('list_option', 'keyword'),
        'admin-assets/custom/category_index.js'
    );
}
function add_option()
{
    admin_render(
        'option/add_option.php',
    );
}
function add_new_option()
{
    
        $name = $_POST['name'];
        $image = $_FILES['image']['name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $target_dir = 'public/client-assets/dist/images/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES['hinh']['name'])). " has been uploaded.";
        }
        $sql = "INSERT into option (name_option,image,price,discount) VALUES('$name','$image','$price','$discount') ";
        executeQuery($sql);
        header('location: ' . ADMIN_URL . 'option');
    
}
function edit_option()
{
    $sql = "SELECT * from option where id_option=" . $_GET['id'];
    $dsoption = executeQuery($sql);
    admin_render(
        'option/edit_option.php',
        compact('dsoption')
    );
}
function update_option()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $target_dir = 'public/client-assets/dist/images/';
    $target_file = $target_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES['hinh']['name'])). " has been uploaded.";
    }
    if ($image != "") {
        $sql = "UPDATE option set name_option ='" . $name . "'   ,image ='" . $image . "' ,price ='" . $price . "', discount ='" . $discount . "' where id_option = $id";
    } else {
        $sql = "UPDATE option set name_option ='" . $name . "'   ,price ='" . $price . "', discount ='" . $discount . "'where id_option = $id";
    }
    executeQuery($sql);
    header('location: ' . ADMIN_URL . 'option');
}
function del_option()
{
    $sql = "DELETE from option where id_option = " . $_GET['id'];
    executeQuery($sql);
    header('location: ' . ADMIN_URL . 'option');
}

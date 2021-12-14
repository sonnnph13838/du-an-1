<?php
require_once './dao/system_dao.php';
function list_food()
{
    $category = isset($_GET['category']) ? $_GET['category'] : "";
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $sql = "SELECT * from food ";
    if ($category > -1) {
        $sql .= " WHERE id_type = $category ";
    } elseif ($keyword > 0) {
        $sql .= "where name_food like '%$keyword%'";
    }
    $list_food =  pdo_query($sql);
    $sqls = "SELECT * from category ";
    $list_category =  pdo_query($sqls);
    admin_render(
        'food/list_food.php',
        compact('list_food', 'keyword', 'list_category'),
        'admin-assets/custom/category_index.js'
    );
}
function edit_food()
{
    $sql = "SELECT * from food where id_food =" . $_GET['id'];
    $list_food =  pdo_query($sql);
    $sqls = "SELECT * from category ";
    $list_category =  pdo_query($sqls);
    admin_render(
        'food/edit_food.php',
        compact('list_food', 'list_category')
    );
}
function add_food()
{
    $sqls = "SELECT * from category ";
    $list_category =  pdo_query($sqls);
    admin_render(
        'food/add_food.php',
        compact('list_category')
    );
}
function save_add_food()
{

    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $target_dir = 'public/client-assets/dist/images/';
    $target_file = $target_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES['hinh']['name'])). " has been uploaded.";
    }
    $sql = "INSERT into food (name_food,image_food,price_food,discount_food,detail_food,id_type) values ('$name','$image','$price','$discount','$detail','$category')";
    executeQuery($sql);
    header('location: ' . ADMIN_URL . 'food');
}
function  save_update_food()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $target_dir = 'public/client-assets/dist/images/';
    $target_file = $target_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES['hinh']['name'])). " has been uploaded.";
    }
    if ($image != "") {
        $sql = "UPDATE food set name_food ='" . $name . "'   ,image_food ='" . $image . "' ,price_food ='" . $price . "', discount_food ='" . $discount . "', detail_food ='" . $detail . "', id_type ='" . $category . "' where id_food = $id";
    } else {
        $sql = "UPDATE food set name_food ='" . $name . "'   ,price_food ='" . $price . "', discount_food ='" . $discount . "', detail_food ='" . $detail . "', id_type ='" . $category . "' where id_food = $id";
    }
    executeQuery($sql);
    header('location: ' . ADMIN_URL . 'food');
}
function del_food()
{
    $sql = "DELETE from food where id_food = " . $_GET['id'];
    executeQuery($sql);
    header('location: ' . ADMIN_URL . 'food');
}

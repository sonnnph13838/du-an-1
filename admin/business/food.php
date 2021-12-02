<?php
require_once './dao/system_dao.php';
function list_food()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $sql = "SELECT * from food where name_food like '%$keyword%'";
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
    // $sql = "SELECT * from food where id_food= $id";
    // $list_food =  pdo_query_one($sql);


    // $sqls = "SELECT * from category ";
    // $list_category =  pdo_query($sqls);
    // admin_render(
    //     'food/edit_food.php',
    //     compact('list_food', 'list_category')
    // );
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
    $image = $_FILES['image'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $filename = "";
    if ($image['size'] > 0) {
        $filename = uniqid() . '-' . $image['name'];
        move_uploaded_file($image['tmp_name'], './uploads/' . $filename);
        // cập nhật lại tên ảnh bỏ ký tự ./ đi để lưu vào csdl
        $filename = 'upload/' . $filename;
    }
    $sql = "insert into food (name_food,image_food,price_food,discount_food,detail_food,id_type) values ('$name','$filename','$price','$discount','$detail','$category')";
    executeQuery($sql);
    header('location: ' . ADMIN_URL . 'food');
}

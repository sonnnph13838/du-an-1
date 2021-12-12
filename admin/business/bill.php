<?php
function list_bill()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "select * from bill where name_bill like '%$keyword%'";
    $cates = executeQuery($sql, true);
    // hiển thị view
    admin_render(
        'bill/index.php',
        compact('cates', 'keyword'),
        'admin-assets/custom/category_index.js'
    );
}
function del_bill()
{
    $id = $_GET['id'];
    $sql = "delete from bill where id_bill = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'bill');
}
function edit_status()
{
    $id = $_POST['id'];
    $status = $_POST['status'];
    if ($status == 0) {
        $sql = "UPDATE bill SET status = 0 where  id_bill = '$id'";
        pdo_execute($sql);
    } elseif ($status == 1) {
        $sql = "UPDATE bill SET status = 1 where  id_bill =  '$id'";
        pdo_execute($sql);
    } elseif ($status == 2) {
        $sql = "UPDATE bill SET status = 2 where  id_bill =  '$id'";
        pdo_execute($sql);
    } elseif ($status == 3) {
        $sql = "UPDATE bill SET status = 3 where  id_bill =  '$id'";
        pdo_execute($sql);
    }
    if ($status == 0) {
        $sql = "UPDATE cart SET status = 0 where  id_bill = '$id'";
        pdo_execute($sql);
    } elseif ($status == 1) {
        $sql = "UPDATE cart SET status = 1 where  id_bill =  '$id'";
        pdo_execute($sql);
    } elseif ($status == 2) {
        $sql = "UPDATE cart SET status = 2 where  id_bill =  '$id'";
        pdo_execute($sql);
    } elseif ($status == 3) {
        $sql = "UPDATE cart SET status = 3 where  id_bill =  '$id'";
        pdo_execute($sql);
    }
    header('Location: ' . ADMIN_URL . 'bill');
}

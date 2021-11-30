<?php

function cate_index()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "select * from category";
    $cates = executeQuery($sql, true);

    // hiển thị view
    admin_render('category/index.php', compact('cates'));
}

function cate_remove()
{
    $id = $_GET['id'];
    $sql = "delete from category where id_category = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'danh-muc');
}
function add_cate()
{
    admin_render('category/add.php');
}
function post_cate()
{
    if (isset($_POST['add']) && ($_POST['add'])) {
        $name = $_POST['name'];
        $sql = "INSERT INTO `category`(`name_category`) VALUES ('" . $name . "')";
        executeQuery($sql);
        header('Location: ' . ADMIN_URL . 'danh-muc/tao-moi&msg=Thêm Mới Thành công!!!');
    }
}
function update_cate()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        $sql = "select * from category where id_category=" . $id;
        $items = executeQuery($sql, false);
    }
    admin_render('category/update.php', compact('items'));
}
function post_update()
{
    if (isset($_POST['update']) && ($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql = "update  category set name_category ='" . $name . "' where id_category=" . $id;
        executeQuery($sql);
        header('Location: ' . ADMIN_URL . 'danh-muc&msg=Cập nhậtThành công!!!');
    }
}
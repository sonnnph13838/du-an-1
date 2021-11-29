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
<?php

function list_products_top()
{
    $sql = "select * from food where 1 order by views_food desc limit 0,4";
    $topsanpham = executeQuery($sql, true);
    return $topsanpham;
}

function list_products_sell()
{
    $sql = "select * from food where discount_food > 0 ";
    $sanphamkm = executeQuery($sql, true);
    return $sanphamkm;
}
function show_cmt()
{
    $sql = "select * from comment";
    $listcmt = executeQuery($sql, true);
    client_render('coment.php', compact('listcmt', '$listuser'));
}
function post_cmt()
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if (isset($_POST['guibl']) && ($_POST['guibl'])) {

        $date = date('m/d/Y', time());
        $cmt = $_POST['cmt'];
        $sql = "INSERT INTO comment (content, date) values ('$cmt', '$date')";
        executeQuery($sql);
    }
    header('location: ' . BASE_URL . 'comment');
}
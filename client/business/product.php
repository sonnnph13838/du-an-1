<?php

function list_products_top()
{
    $sql = "select * from food where 1 order by views_food desc limit 0,4";
    $topsanpham = executeQuery($sql, true);
    return $topsanpham;
}

// function list_products_sell()
// {
//     $sql = "select * from food where discount_food > 0 ";
//     $sanphamkm = executeQuery($sql, true);
//     return $sanphamkm;
// }
function show_cmt()
{
    $sql = "SELECT comment.*,user.name_user FROM comment JOIN user ON comment.id_user=user.id_user";
    $listcmt = executeQuery($sql, true);
    // dd($listcmt);
    client_render('ctsp/sp.php', compact('listcmt'));
}
function post_cmt()
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if (isset($_POST['guibl']) && ($_POST['guibl'])) {
        $id_food = $_POST['id_food'];
        // dd($id_food);
        $id = ($_POST['id_user']);
        $date = date('m/d/Y', time());
        $cmt = $_POST['cmt'];
        $sql = "INSERT INTO comment (content, date,id_user,id_food) values ('$cmt', '$date','$id','$id_food')";
        executeQuery($sql);
    }
    header('location: ' . BASE_URL . 'spct&id_food=' . $_POST['id_food']);
}


// function list_products_top(){
// $sql = "select * from food where 1 order by views_food desc limit 0,4";
// $topsanpham = executeQuery($sql,true);
// return $topsanpham;
// }

function list_products_sell()
{
    $sql = "select * from food where discount_food > 0 ";
    $sanphamkm = executeQuery($sql, true);
    return $sanphamkm;
}
function loadone_sanpham()
{
    $id_food = $_GET['id_food'];
    $sql = "select * from food where id_food=" . $id_food;
    $sp = executeQuery($sql, true);
    $sqls = "select * from option where id_food=" . $id_food;
    $sps = executeQuery($sqls, true);
    $sqlcmt = "SELECT comment.*,user.name_user FROM comment JOIN user ON comment.id_user=user.id_user where id_food= " . $id_food;
    $listcmt = executeQuery($sqlcmt, true);
    // dd($listcmt);
    client_render('ctsp/sp.php', compact('sp', 'sps', 'listcmt'));
}
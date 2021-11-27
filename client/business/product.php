<?php 

function list_products_top(){
    $sql = "select * from food where 1 order by views_food desc limit 0,4";
    $topsanpham = executeQuery($sql,true);
    return $topsanpham;
}

function list_products_sell(){
    $sql = "select * from food where discount_food > 0 ";
    $sanphamkm = executeQuery($sql,true);
    return $sanphamkm;
}

?>
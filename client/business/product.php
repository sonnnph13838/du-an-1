<?php 

function list_products(){
    $sql = "select * from food where 1 order by views_food desc limit 0,4";
    $topsanpham = executeQuery($sql,true);
    return $topsanpham;
}


?>
<?php
function list_category(){
    $sql  = "select * from category";
    $categorys = executeQuery($sql,true);
    return $categorys;
}



?>
<?php
function ds_nguoi_dung(){
    $sql = "SELECT * from nguoi_dung order by id desc";
    $ds_nguoi_dung =  pdo_query($sql);
    return $ds_nguoi_dung;
}
function xoa_nguoi_dung(){
    $sql = "DELETE from nguoi_dung where id =".$_GET['id'];
    pdo_execute($sql);
}
?>


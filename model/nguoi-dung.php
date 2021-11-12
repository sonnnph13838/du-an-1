<?php


function nguoi_dung_update($id,$tai_khoan,$mat_khau,$email,$dia_chi,$sdt,$vai_tro,$ho_ten){
    $sql = "UPDATE nguoi_dung SET tai_khoan = ?,mat_khau=?,email=?,dia_chi=?,sdt=?,vai_tro=?,ho_ten=? WHERE id=?";
    pdo_execute($sql,$id,$tai_khoan,$mat_khau,$email,$dia_chi,$sdt,$vai_tro,$ho_ten);
}
function ds_nguoi_dung(){
    $sql = "SELECT * from nguoi_dung where id=$id ";
    $ds_nguoi_dung =  pdo_query($sql);
    return $ds_nguoi_dung;
}
?>    
<?php

    function update_taikhoan($id,$tai_khoan,$mat_khau,$email, $dia_chi, $sdt)
    {
        $sql = "update  nguoi_dung set tai_khoan = '" . $tai_khoan ."',  mat_khau ='" . $mat_khau . "' ,email ='" . $email . "', sdt ='" . $sdt . "', dia_chi ='" . $dia_chi . "' 
       
        where id=  $id";
        executeQuery($sql) ;
    }
?>
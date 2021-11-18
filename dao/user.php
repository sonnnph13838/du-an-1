<?php
    function update_taikhoan($id, $mat_khau, $email, $dia_chi, $sdt)
    {
        $sql = "update  nguoi_dung set email ='" . $email . "', mat_khau ='" . $mat_khau . "' , sdt ='" . $sdt . "', dia_chi ='" . $dia_chi . "' 
       
        where id=  $id";
        executeQuery($sql) ;
    }
?>
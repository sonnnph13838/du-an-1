<?php 

function checkEmail($email){
    $sql = "select * from nguoi_dung where email = '$email'";
    $dataEmail = executeQuery($sql,false);
    return $dataEmail;
}


function quenmk($email,$pass){
    $sql = "update nguoi_dung set mat_khau = '$pass' where email = '$email'";
    executeQuery($sql,false);
}


?>
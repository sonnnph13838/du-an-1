<?php
function get_connect(){
    $connect = new PDO("mysql:host=127.0.0.1;dbname=nhom_6;charset=utf8", "root", "");
    return $connect;
}


function executeQuery($sql, $getAll = false){

    $connect = get_connect();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    if($getAll){
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}



?>
<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
include "../model/pdo.php";
include '../model/nguoi-dung.php';
switch ($url) {  
    case 'list_nguoi_dung':
        $ds_nguoi_dung = ds_nguoi_dung();
        include './nguoi-dung/ds-nguoi-dung.php';
        break;
    case 'xoa_nguoi_dung':
        if(isset($_GET['id'])&& ($_GET['id']>0)){
            xoa_nguoi_dung($_GET['id']);
        }
        include './nguoi-dung/ds-nguoi-dung.php';
        header('location: list_nguoi_dung');
        break;
    default:
        # code...
        break;
}

?>
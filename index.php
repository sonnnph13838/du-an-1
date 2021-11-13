<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        break;
    case 'dang-nhap':
        require_once './client/business/dang-nhap.php';
    break;

    default:
        # code...
        break;
}

?>
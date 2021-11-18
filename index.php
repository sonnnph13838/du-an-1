<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'client-dangnhap':
        require_once './client/business/tai-khoan/dang-nhap.php';
        formdn();
    break;

    case 'client-dangki':
        require_once './client/business/tai-khoan/dang-ki.php';
        formdk();
    break;






    case 'cp-admin':
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;

    default:
        # code...
        break;
}

?>

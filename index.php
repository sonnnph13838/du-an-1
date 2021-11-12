<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
require_once '.model/taikhoan.php';

switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'danh-muc':
        require_once './client/business/category.php';
        list_product();
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
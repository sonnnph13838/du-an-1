<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'gioi-thieu':
        require_once './client/business/homepage.php';
        about();
    case 'danh-muc':
        require_once './client/business/category.php';
        list_product();
        break;
    case 'cp-admin':
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;
    case 'dang-ki':
        require_once './client/business/dangky.php';
        formdk();
        break;
    case 'postdk':
        require_once './client/business/dangky.php';
        postdk();
        break;
    default:
        # code...
        break;
}
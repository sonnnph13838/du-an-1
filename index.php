<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
require_once './dao/system_dao.php';

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
    case 'admin-user':
        require_once './admin/business/dashboard.php';
        list_user();
        break;
    case 'del_user':
        require_once './admin/business/dashboard.php';
        del_user();
        header('Location: admin-user');
        break;
    default:
        # code...
        break;
}

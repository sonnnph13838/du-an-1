<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
switch ($url) {
    
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
    case 'dang-nhap':
        require_once './client/business/form/login.php';
        login_form();
        break;
    case 'post-login':
        require_once './client/business/form/login.php';
        login_post();
        break;
    case 'logout':
        require_once './client/business/form/login.php';
        logout_form();
        break;
    default:
        # code...
        break;
}

?>

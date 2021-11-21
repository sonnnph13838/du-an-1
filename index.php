<?php
session_start();
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : "/";
require_once './commons/utils.php';
require_once './dao/system_dao.php';

switch ($url) {
    // welcome to clinet...
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'dang-nhap':
        require_once './client/business/user.php';
        formdn();
        break;
    case 'dang-ki':
        require_once './client/business/user.php';
        formdk();
        break;
    case 'postdk':
        require_once './client/business/user.php';
        postdk();
    case 'quen-mk':
        require_once './client/business/user.php';
        formqmk();
        break;
    case 'send-email':
        require_once './client/business/user.php';
        sendmail();
        break;

        //welcome to admin...

    case 'cp-admin':
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;
    case 'cp-admin/user':
        require_once './admin/business/user.php';
        list_users();
        break;
    case 'cp-admin/user/del_user':
        require_once './admin/business/user.php';
        del_user();
        break;
    case 'cp-admin/user/check_role':
        require_once './admin/business/user.php';
        edit_role();
        break;
    case 'cp-admin/user/update_role/update': 
        require_once './admin/business/user.php';
        update_roles();
        break;
    default:
        # code...
        break;
}
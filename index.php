<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
require_once './dao/system_dao.php';
require_once './dao/user.php';

switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'client-dangnhap':
        require_once './client/business/tai-khoan/dang-nhap.php';
        formdn();
    break;

    // case 'client-dangki':
    //     require_once './client/business/tai-khoan/dang-ki.php';
    //     formdk();
    // break;

    case 'client-quenmk':
        require_once './client/business/tai-khoan/quen-mk.php';
        formqmk();
    break;

    case 'send-email':
        require_once './client/business/tai-khoan/quen-mk.php';
        sendmail();
    break;
    case 'cp-admin':
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;
    case 'dang-ki':
        require_once './client/business/tai-khoan/dangky.php';
        formdk();
        break;
    case 'postdk':
        require_once './client/business/tai-khoan/dangky.php';
        postdk();
    case 'admin-user':
        require_once './admin/business/user.php';
        list_users();
        break;
    case 'del_user':
        require_once './admin/business/user.php';
        del_user();
        header('Location: admin-user');
        break;
    case 'update_role':
        require_once './admin/business/user.php';
        edit_user();
        break;
    case 'update_role/update': 
        require_once './admin/business/user.php';
        update_roles();
        break;
    default:
        # code...
        break;
}

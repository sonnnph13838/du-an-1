<?php
session_start();
$url = isset($_GET['url']) ? rtrim($_GET['url'],'/') : "/";
require_once './commons/utils.php';
require_once './dao/system_dao.php';
require_once './dao/user.php';

switch ($url) {
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

    case 'quen-mk':
        require_once './client/business/user.php';
        formqmk();
    break;

    case 'send-email':
        require_once './client/business/user.php';
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
        require_once './admin/business/dashboard.php';
        list_user();
        break;
    case 'del-user':
        require_once './admin/business/dashboard.php';
        del_user();
        header('Location: admin-user');
        break;
    case 'update-role':
        require_once './admin/business/dashboard.php';
        update_roles();
        break;
    case 'update_role/update': 
        require_once './admin/business/dashboard.php';
        $id = $_POST['id'];
        $role = $_POST['role'];
        if($role == 0){
            $sql = "UPDATE nguoi_dung SET vai_tro = 0 where  id = '$id'";
            pdo_execute($sql);   
        }elseif($role == 1){
            $sql = "UPDATE nguoi_dung SET vai_tro = 1 where  id =  '$id'";
            pdo_execute($sql);   
        }
        header('Location: ../admin-user');
        break;
    default:
        # code...
        break;
}

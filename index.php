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

    case 'client-dangki':
        require_once './client/business/tai-khoan/dang-ki.php';
        formdk();
    break;

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
    case 'admin-user':
        require_once './admin/business/dashboard.php';
        list_user();
        break;
    case 'del_user':
        require_once './admin/business/dashboard.php';
        del_user();
        header('Location: admin-user');
        break;
    case 'update_role':
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

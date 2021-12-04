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
    case 'post-login':
        require_once './client/business/user.php';
        post_login();
        break;
    case 'dang-xuat':
        require_once './client/business/user.php';
        logout();
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
    case 'cart':
        require_once './client/business/cart.php';
        layout_cart();
        break;
    case 'add-to-cart':
        require_once './client/business/cart.php';
        add_cart();
        break;
    case 'addOption-to-cart';
        require_once './client/business/cart.php';
        add_option_cart();
        break;
    case 'delete-cart':
        require_once './client/business/cart.php';
        delete_cart();
        break;
    case 'plus':
        require_once './client/business/cart.php';
        plus();
        break;
    case 'pluss':
        require_once './client/business/cart.php';
        pluss();
        break;
    case 'minus':
        require_once './client/business/cart.php';
        minus();
        break;
    case 'minuss':
        require_once './client/business/cart.php';
        minuss();
        break;
    case 'order':
        require_once './client/business/cart.php';
        order();
        break;
    case 'bill':
        require_once './client/business/cart.php';
        bill();
        break;
    case 'comfirmbill':
        require_once './client/business/cart.php';
        comfirmbill();
        break;
    case 'client/user/bill-user/ctdh':
        require_once './client/business/cart.php';
        ctdh();
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
    case 'cp-admin/user/edit_user':
        require_once './admin/business/user.php';
        edit_user();
        break;
    case 'cp-admin/user/update_user/save':
        require_once './admin/business/user.php';
        update_user();
        break;
    case 'client/user/edit-user':
        // unset($_SESSION['email']);
        require_once './client/business/user.php';
        edit_mk();
        break;
    case 'client/user/update-user':
        require_once './client/business/user.php';
        post_update();
        break;
    case 'client/user/bill-user':
        require_once './client/business/cart.php';
        bill_user();
        break;
    case 'client/user/huy-don':
        require_once './client/business/cart.php';
        huy_don();
        break;
    case 'cp-admin/bill';
        require_once './admin/business/bill.php';
        list_bill();
        break;
    case 'cp-admin/bill/del-bill';
        require_once './admin/business/bill.php';
        del_bill();
        break;
    case 'cp-admin/bill/edit-status';
        require_once './admin/business/bill.php';
        edit_status();
        break;
    case 'cp-admin/bill/edit_status/edit':
        require_once './admin/business/bill.php';
        update_status();
        break;
    case 'cp-admin/food':
        require_once './admin/business/food.php';
        list_food();
    case 'cp-admin/food/edit_food':
        require_once './admin/business/food.php';
        edit_food();
        break;
    case 'cp-admin/food/add_food':
        require_once './admin/business/food.php';
        add_food();
        break;
    case 'cp-admin/food/add_food/save':
        require_once './admin/business/food.php';
        save_add_food();
        break;
    case 'cp-admin/food/update_food/save':
        require_once './admin/business/food.php';
        save_update_food();
        break;
    case 'cp-admin/food/del_food':
        require_once './admin/business/food.php';
        del_food();
    default:
        # code...
        break;
}

<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        break;
    case 'dang-ky':
            require_once './client/business/dangky.php';
    break;

    default:
        # code...
        break;
}

?>
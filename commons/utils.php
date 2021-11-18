<?php

const BASE_URL = "http://localhost/du-an-1/";
const ADMIN_ASSET = BASE_URL . 'public/admin-assets/';
const CLIENT_ASSET = BASE_URL . 'public/client-assets/';


function dd()
{
    $data = func_get_args();
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

function client_render($view, $data = [])
{
    extract($data);
    $view = './client/views/' . $view;
    include_once "./client/views/layouts/main.php";
}

function admin_render($view, $data = [])
{
    extract($data);
    $view = './admin/views/' . $view;
    include_once "./admin/views/layouts/main.php";
}
// function clien_dk($view, $data = [])
// {
//     extract($data);
//     $view = './client/views/' . $view;
//     include_once "./client/views/tai-khoan/dang-ki.php";
// }
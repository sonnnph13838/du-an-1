<?php

<<<<<<< Updated upstream
const BASE_URL = "http://localhost/du-an-1/";
=======
const BASE_URL = "http://localhost:8080/DA1/";
>>>>>>> Stashed changes
const ADMIN_URL = BASE_URL . 'cp-admin/';
const ADMIN_ASSET = BASE_URL . 'public/admin-assets/';
const CLIENT_ASSET = BASE_URL . 'public/client-assets/';
const UPLOAD_IMAGE = CLIENT_ASSET . 'dist/images/';

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

function admin_render($view, $data = [], $jsFile = [])
{
    extract($data);
    $view = './admin/views/' . $view;
    include_once "./admin/views/layouts/main.php";
}

function update_img($imageValue = "", $image){
                // $imageValue = $_POST['imagehden'];
                // $image = $_FILES['image'];
                if($image['size']>0){
                      $filename = uniqid() . '-' . $image['name'];
                      move_uploaded_file($image['tmp_name'], '../images/' .$filename);
                      $imageValue = 'images/' . $filename;
                }
                return $imageValue;
}

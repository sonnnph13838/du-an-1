<?php

function list_banner(){
    $sql = "select * from slide";
    $listbanner = executeQuery($sql,true);
    admin_render('banner/index.php',compact('listbanner'));
}

function add_banner(){
    admin_render('banner/add-banner.php');
}

function post_banner(){
    $image = $_FILES['image'];
    $imageValue = update_img("",$image);

    $sql = "insert into slide(image) values ('$imageValue')";
    executeQuery($sql);
    header("location: ". ADMIN_URL .'banner/add-banner');
}

function select_banner_id(){
    $id = $_GET['id'];
    $sql = "select * from slide where id = $id";
    $banner = executeQuery($sql,false);
    admin_render('banner/edit-banner.php', compact('banner'));
}

function post_edit_banner(){
    $id = $_POST['id'];
    $image = $_FILES['image'];
    $imageValue = $_POST['image_po'];
    $imageVa = update_img($imageValue,$image);
    
    $sql = "update slide set image = '$imageVa' where id = $id";
    executeQuery($sql, false);
    header("location: ". ADMIN_URL .'banner');

}

function del_banner()
{   
    $id = $_GET['id'];
    $sql = "DELETE from slide where id = $id";
    executeQuery($sql,false);
    header('location: ' . ADMIN_URL . 'banner');
}
?>
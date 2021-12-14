<?php

function display_index(){
    $sql = "select * from contact_infor";
    $contact = executeQuery($sql,false);
    admin_render('display/index.php',compact('contact')); 
}

function post_display(){
    $id = $_POST['id'];
    $facebook = $_POST['facebook'];
    $zalo = $_POST['zalo'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $sub_content = $_POST['sub_content'];

    $sql = "update contact_infor set facebook_url = '$facebook',
                                     zalo_url = '$zalo',
                                     email = '$email',
                                     address = '$address',
                                     sdt = '$phone_number',
                                     sub_content = '$sub_content'
                                     where id = $id";
    executeQuery($sql);
    header("location: ".ADMIN_URL.'display');
}

?>
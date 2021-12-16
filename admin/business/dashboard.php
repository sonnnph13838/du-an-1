<?php

function dashboard_index(){
    $sql = "SELECT count(id_food) from food ";
    $totalProduct = get_rows($sql);
    $sql = "SELECT sum(total) from bill ";
    $totalProfit = get_rows($sql);
    $sql = "SELECT count(id_user) from user ";
    $totalCustomer =  get_rows($sql);
    admin_render('dashboard/index.php', 
        compact('totalProduct', 'totalProfit', 'totalCustomer')); 
}

function checkAuth(){
    if(!isset($_SESSION['email']) || $_SESSION['email']['role'] != 1){
        header("location: " . BASE_URL .'dang-nhap');die;
    };
}


?>

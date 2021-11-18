<?php
require_once './dao/user.php';
require_once './dao/system_dao.php';
function dashboard_index()
{
    $totalProduct = rand(100, 999);
    $totalProfit = rand(1000, 500000);
    $totalCustomer = rand(50, 20000);
    admin_render(
        'dashboard/index.php',
        compact('totalProduct', 'totalProfit', 'totalCustomer')
    );
}
function list_user()
{
    $list_user = list_users();
    admin_render(
        'dashboard/user/list_user.php',
        compact('list_user')
    );
}
function update_roles()
{   
    $list_user = list_users();
    admin_render(
        'dashboard/user/update_ role.php',
        compact('list_user')
    );
}

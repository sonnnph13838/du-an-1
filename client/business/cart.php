<?php
require_once './dao/system_dao.php';
function layout_cart()
{
	$sql = "select * from cart";
	$listCart = executeQuery($sql, true);
	client_render('cart/cart.php', compact('listCart'));
}
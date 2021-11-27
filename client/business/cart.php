<?php
require_once './dao/system_dao.php';
function layout_cart()
{
	$sql = "select * from cart";
	$listCart = executeQuery($sql, true);
	client_render('cart/cart.php', compact('listCart'));
}
$listCart = $_SESSION['cart'];
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
	$cartData = [];
} else {
	$cartData = $_SESSION['cart'];
}

function plus()
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$index = $_GET['index'];
		foreach ($_SESSION['cart'] as $item) {
			if ($item['id_food'] == $id) {
				$x = $item['quantity'] + 1;
			}
		}
		$_SESSION['cart'][$index]['quantity'] = $x;
		header('location: ' . BASE_URL . 'cart');
	}
}

function minus()
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$index = $_GET['index'];
		foreach ($_SESSION['cart'] as $item) {
			if ($item['id_food'] == $id) {
				$x = $item['quantity'] - 1;
			}
		}
		if ($x <= 0) {
			unset($_SESSION['cart'][$index]);
			header('location: ' . BASE_URL . 'cart');
			die;
		}
		$_SESSION['cart'][$index]['quantity'] = $x;
		header('location: ' . BASE_URL . 'cart');
	}
}
// function delete_cart()
// {
// 	$id = $$sql = "delete from cart where id_food= ";
// 	executeQuery($sql, false);
// 	dd($_SESSION['cart']);
// 	header('location: ' . BASE_URL . '');
// }
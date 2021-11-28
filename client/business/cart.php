<?php
require_once './dao/system_dao.php';
function layout_cart()
{

	$listCart = $_SESSION['cart'];
	client_render('cart/cart.php', compact('listCart'));
}

function plus()
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$index = $_GET['index'];
		foreach ($_SESSION['cart'] as $item) {
			if ($item['id_food'] == $id) {
				$x = $item['cart_amount'] + 1;
			}
		}
		$_SESSION['cart'][$index]['cart_amount'] = $x;
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
				$x = $item['cart_amount'] - 1;
			}
		}
		if ($x <= 0) {
			unset($_SESSION['cart'][$index]);
			header('location: ' . BASE_URL . 'cart');
			die;
		}
		$_SESSION['cart'][$index]['cart_amount'] = $x;
		header('location: ' . BASE_URL . 'cart');
	}
}
function delete_cart()
{

	$idcart = $_GET['id'];
	if (!empty($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $select => $val) {
			if ($idcart == $val['id_food']) {
				unset($_SESSION['cart'][$select]);
			}
		}
	}
	header('location: ' . BASE_URL . 'cart');
}

function add_cart()
{
	$id = $_GET['id'];
	$sql = "select * from food where id_food=" . $id;
	$listfood = executeQuery($sql, false);

	if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
		$cartData = [];
	} else {
		$cartData = $_SESSION['cart'];
	}
	// kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa ?
	$flag = -1;
	foreach ($cartData as $key => $value) {
		if ($value['id_food'] == $listfood['id_food']) {
			$flag = $key;
			break;
		}
	}


	if ($flag == -1) {
		// sản phẩm không có trong giỏ hàng
		$listfood['cart_amount'] = 1;

		if ($listfood['discount_food'] > 0) {
			$listfood['gia'] = $listfood['discount_food'];
		} else {
			$listfood['gia'] = $listfood['price_food'];
		}
		// array_push($cartData, $listfood);
		$cartData[] = $listfood;
	} else {
		// sản phẩm đã tồn tại trong giỏ hàng rồi và ở vị trí $flag
		$cartData[$flag]['cart_amount']++;
	}
	$_SESSION['cart'] = $cartData;
	header('location: ' . BASE_URL . '');
}
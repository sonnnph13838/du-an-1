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
function order()
{
	$listCart = $_SESSION['cart'];
	client_render('cart/order.php', compact('listCart'));
}
function bill()
{
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	if (isset($_POST['next_pay']) && ($_POST['next_pay'])) {
		$id_user = $_POST['id'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$date = date('m/d/Y h:i:s a', time());
		$tong = $_POST['tong'];
		$sql = "INSERT into bill(id_user,name_bill,tel,email,address,date,total) VALUES ('$id_user','$name','$tel','$email','$address','$date','$tong')";
		$id_bill = pdo_execute_return_lastInsertId($sql);
		$sqls = "select *from bill where id_bill=$id_bill";
		$bill =  executeQuery($sqls, true);
	}
	$listCart = $_SESSION['cart'];
	client_render('cart/bill.php', compact('bill','listCart'));
}
function comfirmbill()
{
	if (isset($_POST['pay']) && ($_POST['pay'])) {
		$id_bill = $_POST['id'];
		$payment = $_POST['pttt'];
		if ($payment == 0) {
			$sql = "UPDATE  bill set payment = 0 where id_bill=$id_bill";
			pdo_execute($sql);
		} elseif ($payment == 1) {
			$sql = "UPDATE  bill set payment = 1 where id_bill=$id_bill";
			pdo_execute($sql);
		} elseif ($payment == 2) {
			$sql = "UPDATE  bill set payment = 2 where id_bill=$id_bill";
			pdo_execute($sql);
		}
	}
	if (isset($_POST['huy']) && ($_POST['huy'])) {
		$id_bill = $_POST['id'];
		$sql = "DELETE from  bill  where id_bill=$id_bill";
		pdo_execute($sql);
	}
	header('Location: ' . BASE_URL . '');
}
function bill_user()
{
	$sql = "select * from bill where id_user=" . $_SESSION['email']['id_user'];
	$cates = executeQuery($sql, true);
	client_render('cart/bill_user.php', compact('cates'));
}
function huy_don()
{	
		$id = $_GET['id'];
		$sql = "update  bill set status = 3 where id_bill=" . $id;
		executeQuery($sql);
	header('Location: ' . BASE_URL . 'client/user/bill-user');
	
}

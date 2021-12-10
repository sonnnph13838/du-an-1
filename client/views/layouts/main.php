<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>complete responsive food website design tutorial</title>
	<!-- bootrap-link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	


	<!-- custom css file link  -->
	<link rel="stylesheet" href="<?= CLIENT_ASSET ?>dist/css/style.css" />
</head>

<body>
	<!-- header section starts  -->

	<header>
		<div class="c">
			<a href="<?= BASE_URL ?>" class="logo"><i class="fas fa-utensils"></i>food</a>
			<nav class="navbarr">

				<ul class="menu">
					<li><a href="">Trang chủ</a></li>
					<li class="thucdon">
						<a href="">Thực đơn</a>
						<ul class="dropdowm">
							<?php require_once './client/business/category.php';
							$categorys = list_category();
							?>
							<?php foreach ($categorys as $item) : ?>
							<li><a href=""><?= $item['name_category'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li><a href="<?=BASE_URL . 'about'?>">Giới thiệu</a>
					</li>
				</ul>
			</nav>
		</div>
		<div id="menu-bar" class="fas fa-bars"></div>

		<div class="c">
			<form action="">
				<input type="text" placeholder="Nhập vào đây để tìm kiếm">
			</form>
			<?php
			if (isset($_SESSION['email'])) {
				extract($_SESSION['email']);
			?>
			<select name="" id="" onchange="location = this.value;">
				<option value=""><?= $name_user ?></option>
				<!-- <option value="index.php?act=mybill">Đơn hàng của tôi</option> -->
				<option value="<?= BASE_URL . 'client/user/edit-user' ?>">Cập nhật tài khoản</option>
				<option value="<?= BASE_URL . 'client/user/bill-user' ?>">Đơn hàng của tôi</option>
				<!-- <option value="index.php?act=dmk">Đổi mật khẩu</option> -->
				<option value="<?= BASE_URL . 'dang-xuat' ?>">Thoát</option>
			</select>
			<a href="<?= BASE_URL ?>cart"><i class="fas fa-shopping-cart"></i></a>
			<?php } else { ?>
			<nav class="navbarr">
				<a href="<?= BASE_URL . 'dang-nhap' ?>">Đăng Nhập</a>
				<a href="<?= BASE_URL . 'dang-ki' ?>"
					style="margin-left: 5px; border-left: 1px solid #666; padding-left: 5px;">Đăng kí</a>
				<a href="<?= BASE_URL ?>cart"><i class="fas fa-shopping-cart"></i></a>
			</nav>
			<?php } ?>
		</div>

	</header>

	<!-- header section ends -->
	
	<main>
		<?php include_once $view;?>
	</main>			
		
	

	<!-- main -->

	<!-- footer section  -->
	
	<section class="footer">
		<div class="share">
			<a href="<?= CLIENT_ASSET ?>dist/#" class="btn">facebook</a>
			<a href="<?= CLIENT_ASSET ?>dist/#" class="btn">twitter</a>
			<a href="<?= CLIENT_ASSET ?>dist/#" class="btn">instagram</a>
			<a href="<?= CLIENT_ASSET ?>dist/#" class="btn">pinterest</a>
			<a href="<?= CLIENT_ASSET ?>dist/#" class="btn">linkedin</a>
		</div>

		<h1 class="credit">
			created by <span> N6 </span> | all rights reserved!
		</h1>

		
	</section>


	<!-- loader  -->
	<div class="loader-container">
		<img src="<?= CLIENT_ASSET ?>dist/images/loader.gif" alt="" />
	</div>

	<!-- custom js file link  -->
	<script src="<?= CLIENT_ASSET ?>dist/js/script.js"></script>
</body>

</html>

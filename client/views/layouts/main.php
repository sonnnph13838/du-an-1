<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>N6-food: đồ ăn nhanh</title>
	<!-- bootrap-link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- font awesome cdn link  -->


	<!-- custom css file link  -->

	<link rel="stylesheet" href="<?= CLIENT_ASSET ?>dist/css/style.css" />
	<link rel="stylesheet" href="<?= CLIENT_ASSET ?>dist/css/page-product.css" />
	
</head>

<body>
	<!-- header section starts  -->

	<header>
		<div class="c">
			<a href="<?= BASE_URL ?>" class="logo"><i class="fas fa-utensils"></i>food</a>
			<nav class="navbarr">

				<ul class="menu">
					<li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
					<li class="thucdon">
						<a href="<?= BASE_URL . 'mon-an'?>">Thực đơn</a>
						<ul class="dropdowm">
							<?php require_once './client/business/category.php';
							$categorys = list_category();
							?>
							<?php foreach ($categorys as $item) : ?>
							<li><a href="<?= BASE_URL . 'mon-an'.'&iddm='.$item['id_category']?>"><?= $item['name_category'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li><a href="">Giới thiệu</a>
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
			<?php } else { ?>
			<nav class="navbarr">
				<a href="<?= BASE_URL . 'dang-nhap' ?>">Đăng Nhập</a>
				<a href="<?= BASE_URL . 'dang-ki' ?>" style="margin-left: 5px; border-left: 1px solid #666; padding-left: 5px;"> Đăng kí</a>
			</nav>
			<?php } ?>
			<div class="gio_hang">
				<a href="<?= BASE_URL ?>cart" class="cart"><i class="fas fa-shopping-cart"></i></a>
				<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
					<p><?= count($_SESSION['cart']) ?></p>
				<?php endif?>
			</div>
		</div>

	</header>

	<!-- header section ends -->

	<!-- main --><?php include $view; ?>

	<!-- footer section  -->

	<section class="footer">

    <div class="box-container">
	        <?php 
			      require_once './client/business/contact_infor.php';
				  $contact = slectData();
			?>
        <div class="box">
            <h2 class="logo-fter"><i class="fas fa-utensils"></i>food</h2>
            <p class="introduce_content"><?= $contact['sub_content']?></p>
        </div>

        <div class="box">
            <h3>Thực đơn gồm</h3>
            <?php foreach ($categorys as $item) : ?>
				<a href=""><?= $item['name_category'] ?></a>
			<?php endforeach ?>
        </div>

        <div class="box">
            <h3>Thông tin liên hệ</h3>
            <a href="#">+<?= $contact['sdt']?></a>
            <a href="#"><?= $contact['email']?></a>
            <a href="#"><?= $contact['address']?></a>
        </div>

        <div class="box">
            <h3>Theo dõi chúng tôi tại</h3>
            <a href="<?= $contact['facebook_url']?>">facebook</a>
            <a href="#">zalo</a>
        </div>

    </div>

    <div class="credit"> copyright @ 2021 by <span>Ns6</span> </div>

</section>

	<!-- loader  -->

	<!-- custom js file link  -->
	<script src="<?= CLIENT_ASSET ?>dist/js/script.js"></script>
</body>

</html>

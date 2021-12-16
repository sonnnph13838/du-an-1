<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>N6-food: đồ ăn nhanh</title>
	<!-- bootrap-link -->
	<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



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
					<li><a href="">Trang chủ</a></li>
					<li class="thucdon">
						<a href="<?= BASE_URL . 'mon-an' ?>">Thực đơn</a>
						<ul class="dropdowm">
							<?php require_once './client/business/category.php';
							$categorys = list_category();
							?>
							<?php foreach ($categorys as $item) : ?>
								<li><a href="<?= BASE_URL . 'mon-an' . '&iddm=' . $item['id_category'] ?>"><?= $item['name_category'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li><a href="<?= BASE_URL . 'about' ?>">Giới thiệu</a>
					</li>
					<li><a href="<?= BASE_URL . 'lien-he' ?>">Liên Hệ</a>
				</ul>
			</nav>
		</div>
		<div id="menu-bar" class="fas fa-bars"></div>

		<div class="c">
			<form action="<?= BASE_URL . 'post-timkiem' ?>" method="get">
				<input type="text" name="tukhoa" value="<?php
														if (!isset($tukhoa)) {
															$tukhoa = "";
														} else {
															echo $tukhoa;
														}

														?>" placeholder="Nhập vào đây để tìm kiếm">
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
					<?php if ($role == 1) : ?>
						<option value="<?= ADMIN_URL ?>">Vào trang quản trị</option>
					<?php endif ?>
					<!-- <option value="index.php?act=dmk">Đổi mật khẩu</option> -->
					<option value="<?= BASE_URL . 'dang-xuat' ?>">Thoát</option>
				</select>
				<a href="<?= BASE_URL ?>cart"><i class="fas fa-shopping-cart"></i></a>
			<?php } else { ?>
				<nav class="navbarr">
					<a href="<?= BASE_URL . 'dang-nhap' ?>">Đăng Nhập</a>
					<a href="<?= BASE_URL . 'dang-ki' ?>" style="margin-left: 5px; border-left: 1px solid #666; padding-left: 5px;">Đăng kí</a>
					<a href="<?= BASE_URL ?>cart"><i class="fas fa-shopping-cart"></i></a>
				</nav>
			<?php } ?>
		</div>

	</header>

	<!-- header section ends -->

	<main>
		<?php include_once $view; ?>
	</main>



	<!-- main -->

	<!-- footer section  -->

	<section class="footer">
		<div class="box-container">

			<div class="box">
				<h2 class="logo-fter"><i class="fas fa-utensils"></i>food</h2>
				<p class="introduce_content">Sản phẩm độc quyền của Ns6. Chuyên phục vụ những món ăn nhanh chất lượng. Giá cả hợp lí. Nhanh chóng, tiện lợi</p>
			</div>

			<div class="box">
				<h3>Thực đơn gồm</h3>
				<?php foreach ($categorys as $item) : ?>
					<a href=""><?= $item['name_category'] ?></a>
				<?php endforeach ?>
			</div>

			<div class="box">
				<h3>Thông tin liên hệ</h3>
				<a href="#">+123-456-7890</a>
				<a href="#">+111-222-3333</a>
				<a href="#">shaikhanas@gmail.com</a>
				<a href="#">anasbhai@gmail.com</a>
				<a href="#">mumbai, india - 400104</a>
			</div>

			<div class="box">
				<h3>Theo dõi chúng tôi tại</h3>
				<a href="#">facebook</a>
				<a href="#">twitter</a>
				<a href="#">instagram</a>
				<a href="#">linkedin</a>
			</div>

		</div>

		<div class="credit"> copyright @ 2021 by <span>Ns6</span> </div>

	</section>

	<!-- loader  -->

	<!-- custom js file link  -->
	<script src="<?= CLIENT_ASSET ?>dist/js/script.js"></script>
</body>

</html>
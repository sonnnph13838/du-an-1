<!-- home section starts  -->


<div id="myCarousel" class="carousel slide mg" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">

		<div class="item active">
			<img src="https://kfcvietnam.com.vn/uploads/banner/6623578de98cdfd67dd57ad527cd52bc.jpg" alt="Los Angeles" style="width:100%; height:800px">
			<div class="carousel-caption">
				<h3>Los Angeles</h3>
				<p>LA is always so much fun!</p>
			</div>
		</div>

		<div class="item">
			<img src="https://global-uploads.webflow.com/5ef5480befd392489dacf544/5f9f5e5943de7e69a1339242_5f44a7398c0cdf460857e744_img-image.jpeg" alt="Chicago" style="width:100%;height:800px">
			<div class="carousel-caption">
				<h3>Chicago</h3>
				<p>Thank you, Chicago!</p>
			</div>
		</div>

		<div class="item">
			<img src="https://global-uploads.webflow.com/5ef5480befd392489dacf544/5f9f5e5943de7e69a1339242_5f44a7398c0cdf460857e744_img-image.jpeg" alt="New York" style="width:100%;height:800px">
			<div class="carousel-caption">
				<h3>New York</h3>
				<p>We love the Big Apple!</p>
			</div>
		</div>

	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<!-- home section ends -->

<!-- step -->
<div class="step-container">
	<section class="steps">
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-1.jpg" alt="" />
			<h3>chọn món ăn cần mua</h3>
		</div>
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-2.jpg" alt="" />
			<h3>đợi nhân viên ship tới</h3>
		</div>
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-3.jpg" alt="" />
			<h3>trả tiền khi nhận được hàng</h3>
		</div>
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-4.jpg" alt="" />
			<h3>cuối cùng, thưởng thức thôi </h3>
		</div>
	</section>
</div>
<!-- step -->

<!-- sản phẩm nổi bật  -->
<section class="menuu">

	<h1 class="heading-product"> Top Món ă n được ưa thích </h1>

	<div class="box-container">
		<?php

		require_once './client/business/product.php';
		$list4like = list_products_top();

		?>

		<?php foreach ($list4like as $itemLike) : ?>
			<div class="boxx">
				<div class="image">
					<?php $img = UPLOAD_IMAGE . $itemLike['image_food']  ?>
					<img src="<?= $img ?>" alt="">
				</div>
				<div class="content">
					<h3><a href="" class="name-pro"><?= $itemLike['name_food'] ?></a></h3>
					<div class="gia">
						<?php if ($itemLike['discount_food'] > 0) : ?>
							<span class="price"><?= number_format($itemLike['discount_food'], 0, ',', '.') ?> vnđ</span>
							<span class="price-km"><?= number_format($itemLike['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php else : ?>
							<span class="price"><?= number_format($itemLike['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php endif ?>
					</div>
					<a href="spct&id_food=<?= $itemLike['id_food'] ?>" class="btn">Xem chi tiết</a>
					<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $itemLike['id_food'] ?>   " class="btn" onclick="abc()">Thêm vào giỏ hàng</a>
				</div>
			</div>
		<?php endforeach ?>

	</div>
</section>
<!-- sản phẩm nổi bật  -->


<!-- sản phẩm khuyến mại  -->
<section class="menuu mg-fter">

	<h1 class="heading-product"> Món ăn được khuyến mại </h1>

	<div class="box-container">
		<?php
		$spkhuyenmai = list_products_sell();
		?>
		<?php foreach ($spkhuyenmai as $itemKm) : ?>
			<div class="boxx">
				<div class="image">
					<?php $img = UPLOAD_IMAGE . $itemLike['image_food']  ?>
					<img src="<?= $img ?>" alt="">
				</div>
				<div class="content">
					<h3><a href="" class="name-pro"><?= $itemKm['name_food'] ?></a></h3>
					<div class="gia">
						<?php if ($itemKm['discount_food'] > 0) : ?>
							<span class="price"><?= number_format($itemKm['discount_food'], 0, ',', '.') ?> vnđ</span>
							<span class="price-km"><?= number_format($itemKm['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php else : ?>
							<span class="price"><?= number_format($itemKm['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php endif ?>
					</div>
					<div class="btn-control">
						<a href="spct&id_food=<?= $itemLike['id_food'] ?>" class="mg-right">Xem chi tiết</a>
						<a href="<?= BASE_URL . 'add-to-cart' ?>" class="btnn" onclick="abc()">Thêm vào giỏ hàng</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</section>
<script>
	function abc() {
		confirm("Bạn đã thêm thành công");
	}
</script>

<!-- sản phẩm khuyến mại  -->
<!-- home section starts  -->


<div id="myCarousel" class="carousel slide mg" data-ride="carousel">
        <?php 
		  require_once './client/business/banner.php';
		  $lst = lst_banner();
		?>
	<!-- Indicators -->
	<ol class="carousel-indicators">
	    <?php foreach($lst as $index => $n):?>
			<li data-target="#myCarousel" data-slide-to="<?= $index ?>" class="<?php if($index == 0){echo 'active';}?>"></li>
		<?php endforeach?>
		<!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li> -->
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php foreach($lst as $index => $bn):?>
			<div class="item <?php if($index == 0){
				                echo "active";
				             }?>">
			<img src="<?= UPLOAD_IMAGE . $bn['image']?>" alt="Los Angeles"
				style="width:100%; height:600px">
			<div class="carousel-caption">
			</div>
		</div>
		<?php endforeach?>
		

		<!-- <div class="item">
			<img src="https://global-uploads.webflow.com/5ef5480befd392489dacf544/5f9f5e5943de7e69a1339242_5f44a7398c0cdf460857e744_img-image.jpeg"
				alt="Chicago" style="width:100%;height:600px">
			<div class="carousel-caption">
			</div>
		</div>

		<div class="item">
			<img src="https://global-uploads.webflow.com/5ef5480befd392489dacf544/5f9f5e5943de7e69a1339242_5f44a7398c0cdf460857e744_img-image.jpeg"
				alt="New York" style="width:100%;height:600px">
			<div class="carousel-caption">
			</div>
		</div> -->

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
			<h3>ch???n m??n ??n c???n mua</h3>
		</div>
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-2.jpg" alt="" />
			<h3>?????i nh??n vi??n ship t???i</h3>
		</div>
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-3.jpg" alt="" />
			<h3>tr??? ti???n khi nh???n ???????c h??ng</h3>
		</div>
		<div class="box">
			<img src="<?= CLIENT_ASSET ?>dist/images/step-4.jpg" alt="" />
			<h3>cu???i c??ng, th?????ng th???c th??i </h3>
		</div>
	</section>
</div>
<!-- step -->

<!-- s???n ph???m n???i b???t  -->
<section class="menuu">

	<h1 class="heading-product"> Top M??n ??n n???i b???t </h1>

	<div class="box-container homepage">
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
					<span class="price"><?= number_format($itemLike['discount_food'], 0, ',', '.') ?> vn??</span>
					<span class="price-km"><?= number_format($itemLike['price_food'], 0, ',', '.') ?> vn??</span>
					<?php else : ?>
					<span class="price"><?= number_format($itemLike['price_food'], 0, ',', '.') ?> vn??</span>
					<?php endif ?>
				</div>
				<a href="spct&id_food=<?= $itemLike['id_food'] ?>&id_type=<?=$itemLike['id_type']?>" class="btn">Xem chi ti???t</a>
				<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $itemLike['id_food'] ?>   " class="btn"
					onclick="abc()">Th??m v??o gi??? h??ng</a>
			</div>
		</div>
		<?php endforeach ?>

	</div>
</section>
<!-- s???n ph???m n???i b???t  -->


<!-- s???n ph???m khuy???n m???i  -->
<section class="menuu mg-fterr">

	<h1 class="heading-product"> M??n ??n ???????c khuy???n m???i </h1>

	<div class="box-container homepage">
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
							<span class="price"><?= number_format($itemKm['discount_food'], 0, ',', '.') ?> vn??</span>
							<span class="price-km"><?= number_format($itemKm['price_food'], 0, ',', '.') ?> vn??</span>
						<?php else : ?>
							<span class="price"><?= number_format($itemKm['price_food'], 0, ',', '.') ?> vn??</span>
						<?php endif ?>
					</div>
					<div class="btn-control">
					<a href="spct&id_food=<?= $itemLike['id_food'] ?>&id_type=<?=$itemLike['id_type']?>" class="btn">Xem chi ti???t</a>
						<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $itemLike['id_food'] ?>  " class="btnn" onclick="abc()">Th??m v??o gi??? h??ng</a>
					</div>
				
			</div>
		</div>
		<?php endforeach ?>
	</div>
</section>
<script>
function abc() {
	confirm("B???n ???? th??m th??nh c??ng");
}
</script>
<!-- s???n ph???m khuy???n m???i  -->

<div class="mg-fter mgt pro">
    
<div id="sidebar">
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Danh mục món ăn</h6>
        <ul class="category">
            <li><a href="">Gà rán</a></li>
            <li><a href="">Gà nướng</a></li>
            <li><a href="">Pizza</a></li>
            <li><a href="">Hamberger</a></li>
        </ul>
    </div>
</div>
<!-- products div -->
<div class="menuu product">

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
					<a href="#" class="btn">Xem chi tiết</a>
					<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $itemLike['id_food'] ?>   " class="btn" onclick="abc()">Thêm vào giỏ hàng</a>
				</div>
			</div>
		<?php endforeach ?>

	</div>
</div>
</div>
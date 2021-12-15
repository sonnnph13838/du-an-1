<div class=" pro mgt-dn">
    
<div id="sidebar">
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Danh mục món ăn</h6>
        <ul class="category">
		<?php require_once './client/business/category.php';
							$categorys = list_category();
							?>
							<?php foreach ($categorys as $item) : ?>
							<li><a href="<?= BASE_URL . 'mon-an'.'&iddm='.$item['id_category']?>"><?= $item['name_category'] ?></a></li>
        <?php endforeach ?>
        </ul>
    </div>
</div>
<!-- products div -->
<div class="menuu product">

	<div class="box-container page_product">
		<?php

		require_once './client/business/product.php';
		$listSp = list_product();

		?>
        <?php if(isset($listsanpham) && ($listsanpham)!=""):?>
		
		<h3>KẾT QUẢ TÌM KIẾM:</h3> 
		<?php foreach ($listsanpham as $item) : ?>
			<div class="boxx">
				<div class="image">
					<?php $img = UPLOAD_IMAGE . $item['image_food']  ?>
					<img src="<?= $img ?>" alt="">
				</div>
				<div class="content">
					<h3><a href="" class="name-pro"><?= $item['name_food'] ?></a></h3>
					<div class="gia">
						<?php if ($item['discount_food'] > 0) : ?>
							<span class="e"><?= number_format($item['discount_food'], 0, ',', '.') ?> vnđ</span>
							<span class="m"><?= number_format($item['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php else : ?>
							<span class="e"><?= number_format($item['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php endif ?>
					</div>
					<a href="spct&id_food=<?= $item['id_food'] ?>" class="btn">Xem chi tiết</a>
					<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $item['id_food'] ?>   " class="btn" onclick="abc()">Thêm vào giỏ hàng</a>
				</div>
			</div>
		<?php endforeach ?>
        <?php else : ?>
            <?php foreach ($listSp as $item) : ?>
			<div class="boxx">
				<div class="image">
					<?php $img = UPLOAD_IMAGE . $item['image_food']  ?>
					<img src="<?= $img ?>" alt="">
				</div>
				<div class="content">
					<h3><a href="" class="name-pro"><?= $item['name_food'] ?></a></h3>
					<div class="gia">
						<?php if ($item['discount_food'] > 0) : ?>
							<span class="e"><?= number_format($item['discount_food'], 0, ',', '.') ?> vnđ</span>
							<span class="m"><?= number_format($item['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php else : ?>
							<span class="e"><?= number_format($item['price_food'], 0, ',', '.') ?> vnđ</span>
						<?php endif ?>
					</div>
					<a href="spct&id_food=<?= $item['id_food'] ?>" class="btn">Xem chi tiết</a>
					<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $item['id_food'] ?>   " class="btn" onclick="abc()">Thêm vào giỏ hàng</a>
				</div>
			</div>
		<?php endforeach ?>
        <?php endif ?>
	</div>
</div>
</div>
<div class="ptrang mg-fterr pro">
    <?php
	    phan_trang();
    ?>
</div>
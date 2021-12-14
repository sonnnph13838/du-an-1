<div class="mgt-dn cnter">
	<?php if (!isset($_SESSION['cart']) || $_SESSION['cart'] == []) : ?>
		<h1>Bạn chưa có món ăn nào trong giỏ hàng !!!</h1>
	<?php else : ?>

		<table class="table" style=" 
	width: 90%;
    line-height: 1.5;
    font-size: 15px;">
			<thead>
				<th>STT</th>

				<th>Tên sản phẩm</th>
				<th>Hình</th>

				<th>Giá</th>
				<th>Số lượng trong giỏ hàng</th>
				<th>Tổng giá</th>
				<th>Thao Tác</th>
			</thead>
			<tbody>
				<?php
				$tong = 0;
				?>
				<?php foreach ($listCart as $index => $c) :  ?>


					<tr>

						<td><?= $index + 1 ?> </td>

						<td><?= $c['name_food'] ?></td>
						<td>
							<?php $img = UPLOAD_IMAGE . $c['image_food']  ?>
							<img src="<?= $img ?>" alt="" width="150">
						</td>


						<td><?= number_format($c['gia'], 0, ',', '.') ?> VNĐ</td>
						<td>
							<a class="plus" href=" <?= BASE_URL . 'plus' ?>&index=<?= $index ?>&id=<?= $c['id_food'] ?>"><i class="fas fa-plus"></i></a>
							<span class="sl"><?= $c['cart_amount'] ?></span>
							<a class="minus" href="<?= BASE_URL . 'minus' ?>&index=<?= $index ?>&id=<?= $c['id_food'] ?>"><i class="fas fa-minus"></i></a>
						</td>
						<td>
							<?= number_format($c['gia'] * $c['cart_amount'], 0, ',', '.') ?>
							VNĐ
						</td>
						<td>
							<a class="btn" href="<?= BASE_URL . 'delete-cart' ?>&id=<?= $c['id_food'] ?>"><i class="fas fa-trash"></i></a>
						</td>
						<?php $tong += $c['gia'] * $c['cart_amount']; ?>

					</tr>
				<?php endforeach ?>
				<?php if (!isset($_SESSION['option']) || $_SESSION['option'] == []) : ?>
				<?php else : ?>
					<?php foreach ($listoption as $index => $p) :  ?>
						<tr>
							<td>Thêm</td>

							<td><?= $p['name_option'] ?></td>
							<td>
								<?php $img = UPLOAD_IMAGE . $p['image']  ?>
								<img src="<?= $img ?>" alt="" width="150">
							</td>


							<td><?= number_format($p['price'], 0, ',', '.') ?> VNĐ</td>
							<td>
								<a class="plus" href=" <?= BASE_URL . 'pluss' ?>&index=<?= $index ?>&id=<?= $p['id_option'] ?>"><i class="fas fa-plus"></i></a>
								<span class="sl"><?= $p['quantity'] ?></span>
								<a class="minus" href="<?= BASE_URL . 'minuss' ?>&index=<?= $index ?>&id=<?= $p['id_option'] ?>"><i class="fas fa-minus"></i></a>
							</td>
							<td>
								<?= number_format($p['price'] * $p['quantity'], 0, ',', '.') ?>
								VNĐ
							</td>
							<td>
								<a class="btn"  href="<?= BASE_URL . 'delete-cart-option' ?>&id=<?= $p['id_option'] ?>"><i class="fas fa-trash"></i></a>
							</td>
							<?php $tong += $p['price'] * $p['quantity']; ?>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
				<tr>
					<td colspan="4" class="total"> <b>Tổng giá trị đơn hàng:<b> </td>


					<td></td>
					<td style="color: red;"> <b> <?= number_format($tong, 0, ',', '.') ?> VND </b></td>
					<td><a href="<?= BASE_URL . 'order' ?>" class="btn">Thanh Toán</a></td>

				</tr>



			</tbody>
		</table>
</div>
<div class="mgt-dn mg-fterr">
<h1 align="center">Sẽ thật tuyệt khi có :</h1>
<div class="mgt-dn cnter">
	<?php foreach ($listOption as $itemLike) : ?>
		<div class="boxx">
			<div class="image">
				<?php $img = UPLOAD_IMAGE . $itemLike['image']  ?>
				<img src="<?= $img ?>" alt="" width="250">
			</div>
			<div class="content">
				<h3><a href="" class="name-pro"><?= $itemLike['name_option'] ?></a></h3>
				<div class="gia">
					<?php if ($itemLike['price'] > 0) : ?>
						<span class="price"><?= number_format($itemLike['price'], 0, ',', '.') ?> vnđ</span>
					<?php else : ?>
						<span class="price"><?= number_format($itemLike['price'], 0, ',', '.') ?> vnđ</span>
					<?php endif ?>
				</div>
				<a href="<?= BASE_URL . 'addOption-to-cart' ?>&id=<?= $itemLike['id_option'] ?>   " class="btn" onclick="abc()">Thêm vào giỏ hàng</a>
			</div>
		</div>
	<?php endforeach ?>
</div>
</div>
</div>


<?php endif ?>

<style>
	table,
	th,
	td {
		border: 1px solid #ccc;
		border-collapse: collapse;
		text-align: center;
	}
</style>
<?php

session_start();

?>

<div class="mgt-dn cnter">

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
					<img src="<?= $c['image_food'] ?>" alt="" width="100">
				</td>


				<td><?= number_format($c['gia'], 0, ',', '.') ?> VNĐ</td>
				<td>
					<a class="plus" href=" <?= BASE_URL . 'plus' ?>&index=<?= $index ?>&id=<?= $c['id_food'] ?>"><i
							class="fas fa-plus"></i></a>
					<span class="sl"><?= $c['cart_amount'] ?></span>
					<a class="minus" href="<?= BASE_URL . 'minus' ?>&index=<?= $index ?>&id=<?= $c['id_food'] ?>"><i
							class="fas fa-minus"></i></a>
				</td>
				<td>
					<?= number_format($c['gia'] * $c['cart_amount'], 0, ',', '.') ?>
					VNĐ
				</td>
				<td>
					<a class="btn" href="<?= BASE_URL . 'delete-cart' ?>&id=<?= $c['id_food'] ?>"><i
							class="fas fa-trash"></i></a>
				</td>
				<?php $tong += $c['gia'] * $c['cart_amount']; ?>

			</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="4" class="total"> <b>Tổng giá trị đơn hàng:<b> </td>


				<td></td>
				<td style="color: red;"> <b> <?= number_format($tong, 0, ',', '.') ?> VND </b></td>
				<td><a href="<?= BASE_URL ?>" class="btn">Thanh Toán</a></td>

			</tr>



		</tbody>
	</table>

</div>

<style>
table,
th,
td {
	border: 1px solid #ccc;
	border-collapse: collapse;
	text-align: center;
}
</style>
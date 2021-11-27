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
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm</th>
			<th>Hình</th>
			<th>Đồ ăn thêm</th>
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
				<td><?= $_SESSION['cart']['id_food'] ?></td>
				<td><?= $c['name'] ?></td>
				<td>
					<img src="<?= $c['image'] ?>" alt="" width="100">
				</td>

				<td>Đây là đồ ăn thêm</td>
				<td><?= number_format($c['price'], 0, ',', '.') ?> VNĐ</td>
				<td>
					<a class="plus" href=" <?= BASE_URL . 'plus' ?>&index=<?= $index ?>&id=<?= $c['id_food'] ?>"><i
							class="fas fa-plus"></i></a>
					<span class="sl"><?= $c['quantity'] ?></span>
					<a class="minus" href="<?= BASE_URL . 'minus' ?>&index=<?= $index ?>&id=<?= $c['id_food'] ?>"><i
							class="fas fa-minus"></i></a>
				</td>
				<td>
					<?= number_format($c['price'] * $c['quantity'], 0, ',', '.') ?>
					VNĐ
				</td>
				<td>
					<a class="btn" href="<?= BASE_URL . 'delete-cart' ?>"><i class="fas fa-trash"></i></a>
				</td>
				<?php $tong += $c['price'] * $c['quantity']; ?>

			</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="4" class="total"> <b>Tổng giá trị đơn hàng:<b> </td>

				<td></td>
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
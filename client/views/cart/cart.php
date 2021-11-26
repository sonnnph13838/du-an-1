<div class="mgt-dn cnter">

	<table class="table" style=" 
	width: 90%;
    line-height: 1.5;
    font-size: 15px;">
		<thead>
			<th>STT</th>
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
			<?php foreach ($listCart as $c) :  ?>

			<tr>
				<td><?= $c['id_food'] ?></td>
				<td><?= $c['name'] ?></td>
				<td>
					<img src="<?= $c['hinh'] ?>" alt="" width="100">
				</td>

				<td>Đây là đồ ăn thêm</td>
				<td><?= number_format($c['price'], 0, ',', '.') ?> VNĐ</td>
				<td>
					<i class="fas fa-plus"><?= $c['quantity'] ?><i class="fas fa-minus">
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
				<td><?= number_format($tong, 0, ',', '.') ?>VND</td>
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
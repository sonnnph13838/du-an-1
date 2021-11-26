<div class="mgt-dn cnter">
	<div class="forgot-pass">
		<table class="table">
			<thead>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Hình</th>
				<th>Đồ ăn thêm</th>
				<th>Giá</th>
				<th>Số lượng trong giỏ hàng</th>
				<th>Tổng giá</th>
				<th></th>
			</thead>
			<tbody>
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
						<?= $c['quantity'] ?>
					</td>
					<td>
						<?= number_format($c['price'] * $c['quantity'], 0, ',', '.') ?>
						VNĐ
					</td>
					<td>

				</tr>
				<?php endforeach ?>
				<tr>
					<td colspan="4" class="total">Tổng giá trị đơn hàng:</td>
					<td><?= "đây là tổng tiền" ?></td>
					<td> <button>Tiến hành thanh toán</button> </td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<style>
td,
th,
tr {
	border: 1px solid #ccc;
}
</style>
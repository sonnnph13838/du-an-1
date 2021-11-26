<?php

function form_cart()
{
	client_render('cart/index.php');
}
?>
<div class="mgt-dn cnter">
	<div class="forgot-pass">
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Hình</th>
				<th>Giá</th>
				<th>Số lượng trong giỏ hàng</th>
				<th>Tổng giá</th>
				<th></th>
			</thead>
			<tbody>
				<?php foreach ($cartData as $index => $item) : ?>
				<tr>
					<td><?= $item['ma_hh'] ?></td>
					<td><?= $item['ten_hh'] ?></td>
					<td>
						<img src="<?= $item['hinh'] ?>" alt="" width="100">
					</td>


					<td><?= number_format($item['gia'], 0, ',', '.') ?> VNĐ</td>
					<td>
						<a class="plus"
							href="index.php?act=quantitycong&index=<?= $index ?>&id=<?= $item['ma_hh'] ?>"><i
								class="fas fa-plus"></i></a>
						<span class="sl"><?= $item['cart_amount'] ?></span>
						<a class="minus"
							href="index.php?act=quantitytru&index=<?= $index ?>&id=<?= $item['ma_hh'] ?>"><i
								class="fas fa-minus"></i></a>
					</td>
					<td>
						<?= number_format($item['gia'] * $item['cart_amount'], 0, ',', '.') ?>
						VNĐ
					</td>
					<td>
						<a class="sl" href="index.php?act=delcart&idcart=<?= $item['ma_hh'] ?>"><i
								class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<?php endforeach ?>
				<tr>
					<td colspan="4" class="total">Tổng giá trị đơn hàng:</td>
					<td colspan="3" class="total-value"> VNĐ</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
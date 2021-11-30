<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<form action="" method="get">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<input type="text" name="keyword" value="" class="form-control"
									placeholder="Tìm kiếm..." aria-describedby="helpId">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="card-body">
				<table class="table tabl-stripped">
					<thead>
						<th>STT</th>
						<th>Loại đồ ăn</th>
						<th>
							<a href="<?= ADMIN_URL . 'danh-muc/tao-moi' ?>" class="btn btn-sm btn-success">Tạo mới</a>
						</th>
					</thead>
					<tbody>
						<?php foreach ($cates as $index => $item) : ?>
						<tr>
							<td><?= $index + 1 ?></td>
							<td><?= $item['name_category'] ?></td>
							<td>
								<a href="<?= ADMIN_URL . 'danh-muc/cap-nhat?id=' . $item['id_category'] ?>"
									class="btn btn-sm btn-info">
									<i class="fas fa-edit"></i>
								</a>
								<a href="<?= ADMIN_URL . 'danh-muc/xoa?id=' . $item['id_category'] ?>"
									onclick="confirm_remove('<?= ADMIN_URL . 'danh-muc/xoa?id=' . $item['id_category'] ?>', '<?= $item['name_category'] ?>')"
									class="btn btn-sm btn-danger">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
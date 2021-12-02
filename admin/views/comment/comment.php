<style>
table {
	width: 100%;
}

td {
	text-align: center;
}

th {
	text-align: center;
	color: red;
}
</style>
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
						<th>ID</th>
						<th>Món ăn được bình luận</th>
						<th>Người bình luận</th>
						<th>Nội Dung</th>
						<th>Ngày</th>
					</thead>
					<tbody>
						<?php foreach ($listcmt as $index => $ds) : ?>
						<tr>
							<td><?= $index + 1 ?></td>
							<td><?= $ds['id_food'] ?></td>
							<td><?= $ds['id_user'] ?></td>
							<td><?= $ds['content'] ?></td>
							<td><?= $ds['date'] ?></td>
							<td> <a href="<?= ADMIN_URL . 'xoa-cmt&id=' . $ds['id_cm'] ?>"> Xóa</a> </td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
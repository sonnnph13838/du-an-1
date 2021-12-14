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
						<th>STT</th>
						<th>Món ăn được bình luận</th>
						<th>Người bình luận</th>
						<th>Nội Dung</th>
						<th>Ngày</th>
					</thead>
					<tbody>
						<?php foreach ($listcmt as $index => $ds) : ?>
						<tr>
							<td><?= $index + 1 ?></td>
							<td><?= $ds['name_food'] ?></td>
							<td><?= $ds['name_user'] ?></td>
							<td><?= $ds['content'] ?></td>
							<td><?= $ds['date'] ?></td>
							<td> <a href="<?= ADMIN_URL . 'xoa-cmt&id=' . $ds['id_cm'] ?>" onclick="confirm_remove()">
									Xóa</a> </td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
function confirm_remove() {
	confirm("Bạn có chắc chắn muốn xóa?");
	return true;
}
</script>
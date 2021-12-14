<div class="forgot-pass">
	<?php
	if (isset($_GET['msg']) && ($_GET['msg']) != "") {
		$message = $_GET['msg'];
		echo "<h2 >" . $message . "<h2>";
	}
	?>
	<h3>Cập nhật loại Đồ ăn</h3>
	<form action="post-cate" method="post">
		<input type="hidden" name="id" value="<?= $items['id_category'] ?>">
		<div class="field email">
			<div class="input-area">
				<input type="text" placeholder="Tên loại đồ ăn" name="name" value="<?= $items['name_category'] ?>">
			</div>
		</div>
		<br>
		<input type="submit" value="Cập nhật " name="update">
	</form>
</div>
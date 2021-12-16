<div class="forgot-pass">
	<?php
	if (isset($_GET['msg']) && ($_GET['msg']) != "") {
		$message = $_GET['msg'];
		echo "<h2 >" . $message . "<h2>";
	}
	?>
	<h3>Thêm Mới loại Đồ ăn</h3>
	<form action="post-cate" method="post">
		<div class="field email">
			<div class="input-area">
				<input type="text" placeholder="Tên loại đồ ăn" name="name" required>
			</div>
		</div>
		<br>
		<input type="submit" value="Thêm mới" name="add">
	</form>
</div>
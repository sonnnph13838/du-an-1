<div class="mgt-dn cnter">

	<div class="forgot-pass">
		<h3>Bình luận</h3>
		<table>
			<thead>
				<th>Nội dung</th>
				<th>Ngày</th>
				<th>Người bình luận</th>
			</thead>
			<tbody>
				<tr>
					<td>abc</td>
					<td>11/11</td>
					<td>Tao</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php

if (isset($_SESSION['email'])) : ?>


<div class="mgt-dn cnter">

	<div class="forgot-pass">
		<form action="postdk" method="post">
			<div class="field password">
				<div class="input-area">
					<input type="text" placeholder="Nhập bình luận " name=" cmt">
					<i class="icon fas fa-phone-alt"></i>
				</div>
			</div>
			<input type="submit" value="Gửi bình luận" name="guibl">
		</form>
	</div>
</div>




<?php else : ?>
<h2>Vui lòng đăng nhập để bình luận</h2>

<?php endif ?>
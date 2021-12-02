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
				<?php

				foreach ($listcmt as $cmt) :

				?>

				<tr>
					<td><?= $cmt['content'] ?></td>
					<td><?= $cmt['date'] ?></td>
					<td><?= $cmt['id_user'] ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php

if (isset($_SESSION['email'])) : ?>

<div class="mgt-dn cnter">

	<div class="forgot-pass">
		<form action="post-comment" method="post">
			<div class="field password">
				<div class="input-area">
					<input type="text" placeholder="Nhập bình luận " name="cmt">
					<i class="icon fas fa-phone-alt"></i>
				</div>
			</div>
			<input type="submit" value="Gửi bình luận" name="guibl">
		</form>
	</div>
</div>

<?php else : ?>
<div class="mgt-dn cnter">
	<h2>Vui lòng đăng nhập để bình luận</h2>
</div>
<?php endif ?>
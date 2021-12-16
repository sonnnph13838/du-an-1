<!--Section: Block Content-->
<div class="mgt-dn lefa mg-fterr ">
	<section class="mb-5">

		<div class="row">
			<div class="col-md-6 mb-4 mb-md-0">
				<div id="mdb-lightbox-ui"></div>

				<div class="mdb-lightbox">

					<div class="row product-gallery mx-1">
						<?php foreach ($sp as $gg) : ?>
						<div class="col-12 mb-0">
							<figure class="view overlay rounded z-depth-1 main-img">
								<a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
									data-size="710x823">
									<?php $img = UPLOAD_IMAGE . $gg['image_food'] ?>
									<img src="<?= $img ?>" alt="">
								</a>
							</figure>
						</div>
						<!--Món ăn thêm-->
						
					</div>
					<!-- danh sach binh luan -->
					<div class="cmt">
						<div class="forgot-pass">
							<h2>Bình luận</h2>
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

										<td><?= $cmt['name_user'] ?></td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<?php if (isset($_SESSION['email'])) : ?>
						<form action="post-comment" method="post">
							<input type="hidden" name="id_user" value="<?= $_SESSION['email']['id_user'] ?>">
							<input type="hidden" name="id_food" value="<?= $_GET['id_food'] ?>">
							<input type="hidden" name="id_type" value="<?= $_GET['id_type'] ?>">
							<div class="field password">
								<div class="input-area">
									<input type="text" placeholder="Nhập bình luận " name="cmt">
									<i class="icon fas fa-phone-alt"></i>
								</div>
							</div>
							<input type="submit" value="Gửi bình luận" name="guibl">
						</form>
						<?php else : ?>
						<div class="mgt-dn cnter">
							<h2>Vui lòng đăng nhập để bình luận</h2>
						</div>
						<?php endif ?>
					</div>
					<!-- end ds bl -->
					<!-- món ăn cùng loại -->
					<div>
					<?php require_once './client/business/category.php';
					?>
					<?php foreach ($listspcl as $gv) : ?>
						<div class="cmt">
						<td>
						
						<?php $img = UPLOAD_IMAGE . $gv['image_food'] ?>
						<img style="width: 9%; margin-left: 5px; margin-top:15px"src="<?= $img ?>" alt="">
						<a style="color: black; font-size: 20px" href="spct&id_food=<?= $gv['id_food'] ?>&id_type=<?=$gv['id_type']?>"><?=$gv['name_food']?></a>
					</td>
					</div>
					<?php endforeach ?>
					</div>
					<!-- end món ăn cùng loại -->
				</div>

			</div>
			<div class="col-md-6">
				<p class="mb-2 text-muted text-uppercase small" style="font-size: 20px">Chi Tiết Món ăn:</p>
				<b style="font-size: 20px"><?= $gg['name_food'] ?></b><br>
				Giá:<br>
				<p><span class="mr-1" style="color: red"><strong><?= number_format($gg['price_food'], 0, ',', '.') ?>
							vnđ</span></strong></span></p>
				<p class="pt-1"><?= $gg['detail_food'] ?></p>
				<div class="table-responsive">
					<table class="table table-sm table-borderless mb-0">

					</table>
				</div>
				<hr>
				<div class="table-responsive mb-2">
						</div>
						<a href="<?= BASE_URL . 'add-to-cart' ?>&id=<?= $gg['id_food'] ?>  " class="btnn" onclick="abc()">Thêm vào giỏ hàng</a>
						
			       </div>
			<?php endforeach ?>
		</div>

	</section>
</div>
<style>
.cmt {
	line-height: 1.6;
	width: 100%;
	font-size: 15px;
}

.cmt table {
	width: 100%;

}

.cmt form {
	width: 80%;
}
</style>
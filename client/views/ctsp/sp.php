<!--Section: Block Content-->
<div class="mgt-dn lefa mg-fter">
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
						<?php foreach ($sps as $option) : ?>
						<div class="mon-an-them"
							style="margin-top:20px; border: 1px solid green; width: 500px; border-radius: 5px; ">
							<h4 style="margin-left:20px"><b>Danh Sách Món ăn Thêm:</b></h4>
							<img style="width: 70px;margin-left:18px" src="<?= CLIENT_ASSET ?>dist/images/pic1.png"
								alt="" />

							<button
								style="margin-top: 10px;border-radius: 5px;width: 100px"><?= $option['name_option'] ?></button>
							<input type="checkbox">
							<p style="margin-left:18px;color: red">
								<?= number_format($option['price_option'], 0, ',', '.') ?>vnđ</p>
						</div>
						<!--Món ăn thêm-->
						<?php endforeach ?>
					</div>
					<!-- danh sach binh luan -->
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

										<td><?= $cmt['name_user'] ?></td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>

					<?php

							if (isset($_SESSION['email'])) : ?>
					<?php
								// dd($_SESSION['email']['id_user']);

						?>
					<div class="mgt-dn cnter">
						<div class="forgot-pass">
							<form action="post-comment" method="post">
								<input type="hidden" name="id_user" value="<?= $_SESSION['email']['id_user'] ?>">
								<input type="hidden" name="id_food" value="<?= $_GET['id_food'] ?>">
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
				</div>

			</div>
			<div class="col-md-6">
				<p class="mb-2 text-muted text-uppercase small" style="font-size: 20px">Chi Tiết Món ăn:</p>
				<b style="font-size: 20px"><?= $gg['name_food'] ?></b><br>
				Giá:<br>
				<p><span class="mr-1" style="color: red"><strong><?= number_format($gg['price_food'], 0, ',', '.') ?>
							vnđ</span></strong></span></p>
				<p class="pt-1"><?= $gg['detail_food'] ?></p>
				<?php endforeach ?>
				<div class="table-responsive">
					<table class="table table-sm table-borderless mb-0">

					</table>
				</div>
				<hr>
				<div class="table-responsive mb-2">
					<table class="table table-sm table-borderless">
						<tbody>
							<tr>
								<td class="pl-0 pb-0 w-25"><b>Số Lượng :</b></td>
								<td class="pb-0"><b>Lựa chọn kích cỡ :</b></td>
							</tr>
							<tr>
								<td class="pl-0">
									<div class="def-number-input number-input safari_only mb-0">
										<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
											class="minus"></button>
										<input class="quantity" min="0" name="quantity" value="1" type="number">
										<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
											class="plus"></button>
									</div>
								</td>
								<td>
									<div class="mt-1">
										<div class="form-check form-check-inline pl-0">
											<input type="radio" class="form-check-input" id="small"
												name="materialExampleRadios" checked>
											<label class="form-check-label small text-uppercase card-link-secondary"
												for="small">Nhỏ</label>
										</div>
										<div class="form-check form-check-inline pl-0">
											<input type="radio" class="form-check-input" id="medium"
												name="materialExampleRadios">
											<label class="form-check-label small text-uppercase card-link-secondary"
												for="medium">Vừa</label>
										</div>
										<div class="form-check form-check-inline pl-0">
											<input type="radio" class="form-check-input" id="large"
												name="materialExampleRadios">
											<label class="form-check-label small text-uppercase card-link-secondary"
												for="large">Lớn</label>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<button type="button" class="btn btn-primary btn-md mr-1 mb-2" style="background-color: white">Buy
					now</button>
				<button type="button" class="btn btn-light btn-md mr-1 mb-2"><i
						class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
			</div>
		</div>

	</section>
</div>
<?php foreach ($dsoption as $lf) : ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sửa option</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'option/update_option/save' ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $lf['id_option'] ?>">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên món ăn</label>
                            <input type="text" name="name" value="<?= $lf['name_option'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label><br>
                            <?php $img = UPLOAD_IMAGE . $lf['image']  ?>
                            <img src="<?= $img ?>" alt="" width="400" style="margin-bottom: 20px;">
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" name="price" value="<?= $lf['price'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Giá khuyến mại</label>
                            <input type="text" name="discount" value="<?= $lf['discount'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="<?= ADMIN_URL . 'option' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" name="luu" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>
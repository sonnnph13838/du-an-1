<?php foreach ($list_user as $lf) : ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sửa Người Dùng</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'user/update_user/save' ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $lf['id_user'] ?>">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên món ăn</label>
                            <input type="text" name="name" value="<?= $lf['name_user'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label><br>
                            <?php $img = UPLOAD_IMAGE . $lf['image']  ?>
                            <img src="<?= $img ?>" alt="" width="400" style="margin-bottom: 20px;">
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="<?= $lf['email'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" value="<?= $lf['address'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="tel" value="<?= $lf['tel'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Vai trò</label><br>
                            <input type="radio" value="0" name="role">Khách hàng
                            <input type="radio" value="1" name="role">Nhân viên
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="<?= ADMIN_URL . 'food' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới món thêm</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'option/add_option/save' ?>" method="post" enctype="multipart/form-data">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên món ăn</label>
                            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label><br>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" name="price" class="form-control" placeholder="" aria-describedby="helpId" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= ADMIN_URL . 'option' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" name ="luu" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
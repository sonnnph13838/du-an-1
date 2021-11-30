<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới món ăn</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'food/add_food' ?>" method="post" enctype="multipart/form-data">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên món ăn</label>
                            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label><br>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" name="price" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Giá khuyến mại</label>
                            <input type="text" name="discount" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Chi tiết món ăn</label>
                            <input type="text" name="detail" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" name="category" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Món ăn thêm</label><br>
                            <input type="button" name="option_food" value="Thêm món ăn mới">
                            <input type="button" name="option_food" value="Lựa chọn món ăn có sẵn">
                            <div id="result"></div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="<?= ADMIN_URL . 'danh-muc' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
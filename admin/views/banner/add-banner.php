<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm banner</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'banner/post-banner' ?>" method="post" enctype="multipart/form-data">
                    <div class="">
                        <div class="form-group">
                            <label for="">Hình ảnh</label><br>
                            <input type="file" name="image">
                        </div>

                        <div class="">
                            <input type="submit" value="Thêm mới" class="btn btn-sm btn-info" name="submit" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
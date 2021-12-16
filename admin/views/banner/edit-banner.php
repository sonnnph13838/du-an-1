
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm banner</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'banner/post-edit-banner' ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $banner['id']?>">
                <input type="hidden" name="image_po" value="<?= $banner['image']?>">
                    <div class="">
                        <div class="mb-4">
                            <img src="<?= UPLOAD_IMAGE . $banner['image']?>" alt="" width="300">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label><br>
                            <input type="file" name="image">
                        </div>

                        <div class="">
                            <input type="submit" value="Lưu sửa" class="btn btn-sm btn-info" name="submit" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
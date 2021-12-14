
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?= ADMIN_URL . 'post-display' ?>" method="post">
                  <input type="hidden" name="id" value="<?= $contact['id']?>"> 
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Facebook_url</label>
                        <input type="text" class="form-control" value="<?= $contact['facebook_url']?>" name="facebook">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Zalo_url</label>
                        <input type="text" class="form-control" value="<?= $contact['zalo_url']?>" name="zalo">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="<?= $contact['email']?>" name="email">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" value="<?= $contact['address']?>" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" value="<?= $contact['sdt']?>" name="phone_number">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Giới thiệu ngắn</label>
                        <textarea class="form-control" rows="3" name="sub_content"><?= $contact['sub_content']?></textarea>
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Lưu thay đổi"  >
                </form>
              </div>
              <!-- /.card-body -->
</div>



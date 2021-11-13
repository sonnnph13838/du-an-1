<?php
include '../../model/nguoi-dung.php';
include '../../model/pdo.php';

$nguoi_dung = ds_nguoi_dung();
?>
<form action="index.php?act=edit_taikhoan.php" method="POST" enctype="multipart/form-data"> 

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Họ Và Tên <span class="red">(*)</span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="hoten" value="<?php echo($nguoi_dung['ho_ten'])?>" autofocus />
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Tên đăng nhập <span class="red">(*)</span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="taikhoan"  value="<?php echo($nguoi_dung['tai_khoan'])?>" autofocus />
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">SĐT <span class="red">(*)</span></label>
        <div class="col-md-8">
            <input id="phone" type="text" class="form-control" name="sdt" value="<?php echo($nguoi_dung['sdt '])?>" autofocus />
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-4 control-label">Email <span class="red">(*)</span></label>
        <div class="col-md-8">
            <input id="email" type="email" class="form-control" name="email" value="<?php echo($nguoi_dung['email'])?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-md-4 control-label">Mật khẩu <span class="red">(*)</span></label>
        <div class="col-md-8">
            <input id="password" type="password" class="form-control" name="matkhau" value="<?php echo($nguoi_dung['mat_khau'])?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Địa chỉ <span class="red">(*)</span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="diachi" value="<?php echo($nguoi_dung['dia_chi'])?>" autofocus />
        </div>
    </div>
    <div class="form-group mb-40">

        <div class="col-md-6 text-right">
            <input type="submit" value="Sửa" name="dangki">
        </div>
    </div>
    
    <button class="btn"><a href="">Quay lại</a></button>

    

</form>
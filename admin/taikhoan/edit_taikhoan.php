<?php
include '../../model/nguoi-dung.php';
include '../../model/pdo.php';
$nguoi_dung = ds_nguoi_dung();
?>
<form action="index.php?act=edit_taikhoan.php" method="POST" enctype="multipart/form-data">
    <div>
        id : <input type="hidden"name="id" value="<?php echo($nguoi_dung['id'])?>">
    </div>
    <div>
        Họ Tên: <input type="text" name="name" value="<?php echo($nguoi_dung['ho_ten'])?>">
    </div>
    <br>
    <div>
        Tài khoản: <input type="text" name="taikhoan" value="<?php echo($nguoi_dung['tai_khoan'])?>">
    </div>
    <br>
    <div>
        Mật Khẩu: <input type="password" name="matkhau" value="<?php echo($nguoi_dung['mat_khau'])?>">
    </div>
    <br>
    <div>
        Email: <input type="text" name="email" value="<?php echo($nguoi_dung['email'])?>">
    </div>
    <br>
    <div>
        Địa chỉ: <input type="text" name="diachi" value="<?php echo($nguoi_dung['dia_chi'])?>">
    </div>
    <br>
    <div>
        Số điện thoại: <input type="text" name="sdt" value="<?php echo($nguoi_dung['sdt '])?>">
    </div>
    <button class="btn" type="submit" name="btn_update_kh">Thêm</button>
    <button class="btn"><a href="">Quay lại</a></button>

</form>
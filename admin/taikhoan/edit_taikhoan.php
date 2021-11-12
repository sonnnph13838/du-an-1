<?php
include '../../model/nguoi-dung.php';
include '../../model/pdo.php';
$nguoi_dung = ds_nguoi_dung();
?>
<form action="index.php?act=edit_taikhoan.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class= "col">
            <div class="form-group">
                <label for="">id</label>
                <input class="form-control" type="hidden" name="customer"  value="<?= $nguoi_dung['id']?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Tài khoản</label>
                <input class="form-control" type="text" name="tai_khoan" value="<?= $nguoi_dung['tai_khoan']?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input class="form-control" type="number" name="mat_khau" value="<?= $nguoi_dung['mat_khau']?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">email</label>
                <input class="form-control" type="text" name="email" value="<?= $nguoi_dung['email']?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">dia_chi</label>
                <input class="form-control" type="text" name="ho_ten"  value="<?= $nguoi_dung['dia_chi']?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">sdt</label>
                <input class="form-control" type="number" name="sdt" value="<?= $nguoi_dung['sdt']?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
            <label for="">Vai trò</label>
                <select name="vai_tro" >
                    <option value="0">user</option>
                    <option value="1">admin</option>
                </select>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="">họ tên</label>
                <input class="form-control" type="text" name="ho_ten" value="<?= $nguoi_dung['ho_ten']?>">
            </div>
        </div>
 
    </div>
    <button class="btn" type="submit" name="btn_update_kh">Thêm</button>
    <button class="btn"><a href="">Quay lại</a></button>

</form>





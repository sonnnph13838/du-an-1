<?php
    session_start();
 if(isset($_SESSION['email'])&&(is_array($_SESSION['email']))){
    extract($_SESSION['email']);
    // dd($_SESSION['email']);
}
?>
<div class="mgt-dn cnter mg-fterr">
    <div class="wrapper suatk">

        <h3>Sửa tài khoản</h3>



        <form action="update-user" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?=$id_user?>">


            <div class="input-area">

                
                <?php $img = UPLOAD_IMAGE . $image?>
                <div class="img">
                    <img src="<?= $img ?>" width="200">
                </div>

                
            </div>
            <div class="field email ">
                <div class="input-area ">
                <input type="file" name="image" class="img-1">
                </div>
            </div>

            <div class="field email">
                <div class="input-area">
                    <input type="email" placeholder="Email" name="email" value="<?=$email ?>">
                    <i class="icon fas fa-envelope"></i>
                </div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" placeholder="Mật khẩu" name="matkhau" value="<?=$password ?>">
                    <i class="icon fas fa-lock"></i>
                </div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="text" placeholder="Họ tên" name="hoten" value="<?=$name_user ?>">
                    <i class="icon fas fa-file-alt"></i>
                </div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="text" placeholder="Địa chỉ" name="diachi" value="<?=$address ?>">
                    <i class="icon fas fa-map-marker-alt"></i>
                </div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="text" placeholder="SĐT" name="sdt" value="<?=$tel ?>">
                    <i class="icon fas fa-phone-alt"></i>
                </div>
            </div>
            <input type="submit" value="Cập nhật" name="capnhat">
        </form>

        <?php
		if (isset($_GET['msg']) && ($_GET['msg']) != "")
			echo "<h3>" . $_GET['msg'] . "</h3>"
		?>

    </div>
</div>
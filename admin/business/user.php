<?php
function edit_user(){
    admin_render('tai-khoan/edit-user.php');
}
function post_update(){
    if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $id=$_POST['id'];
        $email=$_POST['email'];
        $matkhau=$_POST['matkhau'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        update_taikhoan($id,$email,$matkhau,$diachi,$sdt); 
        echo 'Ok';
        dd($id);
        
    }
    
}

?>
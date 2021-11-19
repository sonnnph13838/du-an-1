<?php
function edit_user(){
    client_render('tai-khoan/edit-user.php');
}
function post_update(){
    if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $id=$_POST['id'];
        $taikhoan=$_POST['taikhoan'];
        $matkhau=$_POST['matkhau'];
        $email=$_POST['email'];       
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        update_taikhoan($id,$taikhoan,$matkhau,$email,$diachi,$sdt); 
        echo 'Ok';
        // dd($id);
        
        
    }

}

?>
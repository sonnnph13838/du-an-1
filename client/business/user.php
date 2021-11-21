<?php
function edit_user(){
    client_render('tai-khoan/edit-user.php');
}
function post_update(){
    if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $id=$_POST['id'];
        // $taikhoan=$_POST['taikhoan'];
        $matkhau=$_POST['matkhau'];
        $email=$_POST['email'];       
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        update_taikhoan($id,$matkhau,$email,$diachi,$sdt); 
        echo 'Ok';
        // dd($id);
        
        
    }

}
function update_taikhoan($id,$mat_khau,$email, $dia_chi, $sdt)
    {
        $sql = "update  nguoi_dung set   mat_khau ='" . $mat_khau . "' ,email ='" . $email . "', sdt ='" . $sdt . "', dia_chi ='" . $dia_chi . "' 
       
        where id=  $id";
        executeQuery($sql) ;
    }

?>
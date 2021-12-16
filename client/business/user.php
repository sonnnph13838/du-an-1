<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function formdk()
{
    client_render('tai-khoan/dang-ki.php');
}
function postdk()
{
    if (isset($_POST['dangki']) && ($_POST['dangki'])) {
        // $hoten = $_POST['name'];
        // $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        // $sqls = "SELECT email from user where email='".$email."'";
        // $checkuser = executeQuery($sqls,false);
        // if($checkuser != "") { 
        //     header('location: ' . BASE_URL . 'dang-ki&msg=Đã tồn tại email');
        //     die;
        // }else{
            $sql = "INSERT INTO `user`(`password`, `email`, `address`, `tel`) VALUES ('$matkhau','$email','$diachi','$sdt')";
            executeQuery($sql);
            header('location: ' . BASE_URL . 'dang-ki&msg=Đăng kí thành công.. vui lòng đăng nhập!');
        // }
       
        
    }
}
function formdn()
{
    client_render('tai-khoan/dang-nhap.php');
}
function post_login()
{
    if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
        $email=$_POST['email'];
        $mat_khau=$_POST['mat_khau'];
        $sql="select * from user where email='".$email."' AND password='".$mat_khau."'";
        $checkuser=pdo_query_one($sql);
        if(is_array($checkuser)){
        //$thongbao="Bạn Đã Đăng Nhập Thành Công";
        $_SESSION['email']=$checkuser;
        header('location: ' . BASE_URL . '');
        }else{
            header('location: ' . BASE_URL . 'dang-nhap&msg=Sai thông tin');
        }
    }
}
function logout()
{
    session_unset();
    header('location: '. BASE_URL .'');
}

function formqmk()
{
    client_render('tai-khoan/quen-mk.php');
}

function form_reset()
{ 
    $token = $_GET['token'];
    $now = date("Y-m-d H:i:s");
    $sql = "select * from forgot_password where token = '$token' and expire_time >= '$now'";
    $user = executeQuery($sql,false);
    $email = $user['email'];

    client_render('tai-khoan/reset-pass.php',compact('email'));
}

function post_pass_reset(){
    if(isset($_POST['submit']) && ($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['mat_khau'];
        $sql = "update user set password = '$pass' where email = '$email'";
        executeQuery($sql,false);
        // xóa token trong forgot-pas
        $dele = "delete  from forgot_password where email = '$email'";
        executeQuery($dele,false);
        header('location:' . BASE_URL . 'quen-mk&msg= Đổi thành công vui lòng đăng nhập!!');
    }
}

function sendmail()
{
    $email = $_POST['email'];
    $token  = uniqid();
    $timestamp = strtotime("+1 day");
    $expireTime = date("Y-m-d H:i:s",$timestamp);
    $sql = "insert into forgot_password(email,token,expire_time)
                  values('$email','$token','$expireTime')";
    executeQuery($sql,false);
    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->CharSet = 'utf8';                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'shopupde@gmail.com';                     //SMTP username
        $mail->Password   = 'thaicantat2002';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shopupde@gmail.com', 'shopupde@gmail.com');
        $mail->addAddress($email);     //Add a recipient
        $mail->addReplyTo('shopupde@gmail.com', 'Music Nighcore2282');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thông báo mật khẩu mới';
        $mail->Body    = 'Bạn vui lòng ấn <a href="'.BASE_URL.'reset-pass&token='.$token. '">Tại đây!</a> ' ;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header('location:' . BASE_URL . 'quen-mk&msg= Đã có 1 email được gửi cho bạn, vui lòng kiểm tra email của bạn!!');
    } catch (Exception $e) {
        header('location:' . BASE_URL . 'quen-mk&msgerr= Đã gặp lỗi trong quá trình gửi email cho bạn, vui lòng thử lại sau!!');
    }
}

function edit_mk(){
    client_render('tai-khoan/edit-user.php');
}

function post_update(){
    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

        $id=$_POST['id'];
        $hoten=$_POST['hoten'];
        $matkhau=$_POST['matkhau'];
        $email=$_POST['email'];       
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $image=$_FILES['image']['name'];
        $target_dir = 'public/client-assets/dist/images/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES['hinh']['name'])). " has been uploaded.";
        }
    
        
        if($image != ""){
            $sql = "update  user set  name_user ='" . $hoten . "' , password ='" . $matkhau . "' ,email ='" . $email . "', tel ='" . $sdt . "', address ='" . $diachi . "',image ='" . $image . "' 
        
        where id_user =  $id";
        }else{
            $sql = "update  user set  name_user ='" . $hoten . "' , password ='" . $matkhau . "' ,email ='" . $email . "', tel ='" . $sdt . "', address ='" . $diachi . "' 
        
        where id_user =  $id";
        }
        
        executeQuery($sql,false); 
        $sql = "select *from user  where id_user = $id";
        $cntk = executeQuery($sql,false);
        unset($_SESSION['email']); 
        $_SESSION['email'] = $cntk; 
        
        header('location: '. BASE_URL.'client/user/edit-user' );
}
}
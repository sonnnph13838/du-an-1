<?php

require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function formqmk(){
    client_render('tai-khoan/quen-mk.php');
}

function sendmail(){
    $email = $_POST['email'];
    $checkEmail = checkEmail($email);
    $email = $checkEmail['email'];
    if(is_array($checkEmail)){                
        $ps = md5(rand(0,9999));
        $newpss = substr($ps,0,6);
        quenmk($email,$newpss);
    }
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
    $mail->Body    = 'Mật khẩu mới: '.$newpss;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location: ./client-quenmk&msg=da thanh cong');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


?>
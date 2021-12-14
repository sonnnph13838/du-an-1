<?php
require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function check_email(){
if(isset($_POST['submit'])) {
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->CharSet = 'utf8';                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'duongdtph13852@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'doduong123456';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465; 
         //Recipients
         $mail->setFrom('duongdtph13852@fpt.edu.vn', 'duongdtph13852@fpt.edu.vn');
         $mail->addAddress($_POST['email']);     //Add a recipient
         $mail->addReplyTo('duongdtph13852@fpt.edu.vn', 'Music Nighcore2282');
        
        //Content

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Body    = $_POST['content'];
        $mail->send();
        header('location:' . ADMIN_URL . 'feedback&msg= Đã có 1 email được gửi cho bạn, vui lòng kiểm tra email của bạn!!');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }  
}
 }
<?php
function login_form(){
  login_render('layouts/form-login/login.php');
}
function login_post(){
  require_once './dao/system_dao.php';
      $sqlQuery = "select * from nguoi_dung";
      if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
          $tai_khoan=$_POST['tai_khoan'];
          $mat_khau=$_POST['mat_khau'];
          $sqlQuery="select * from nguoi_dung where tai_khoan='".$tai_khoan."' AND mat_khau='".$mat_khau."'";
          $check=executeQuery($sqlQuery);         
          if(is_array($check)){
          $_SESSION['tai_khoan']=$check;
          header('location: ./cp-admin');
          }else{
              $thongbao="Tài Khoản không tồn tại";
          }
      }
      include "./client/views/layouts/form-login/login.php";
}
function logout_form(){
  session_unset();
  header('location: ./dang-nhap');
}
?>
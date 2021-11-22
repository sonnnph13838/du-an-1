<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>complete responsive food website design tutorial</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?= CLIENT_ASSET ?>dist/css/style.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <header>
      <div class="c">
      <a href="<?= BASE_URL?>" class="logo"><i class="fas fa-utensils"></i>food</a>
      <nav class="navbar">
        
        <a href="./">Trang chủ</a>
        <a href="<?= CLIENT_ASSET ?>dist/#speciality">Giới thiệu</a>
        <a href="<?= CLIENT_ASSET ?>dist/#popular">Thực Đơn</a>
        <a href="<?= CLIENT_ASSET ?>dist/#order">Giỏ hàng</a>
      </nav>
      </div>

      <div id="menu-bar" class="fas fa-bars"></div>
      
      <div class="c">
      <form action="">
          <input type="text" placeholder="Nhập vào đây để tìm kiếm">
        </form>
        <?php
        if(isset($_SESSION['email'])){
          extract($_SESSION['email']);
          ?>
          <select name="" id="" onchange="location = this.value;">
            <option value="" ><?=$tai_khoan?></option>
            <!-- <option value="index.php?act=mybill">Đơn hàng của tôi</option> -->
            <option value="client/user/edit-user">Cập nhật tài khoản</option>
            <!-- <option value="index.php?act=dmk">Đổi mật khẩu</option> -->
            <option value="dang-xuat">Thoát</option>
          </select>
          <a href="<?= CLIENT_ASSET ?>dist/#order"><i class="fas fa-shopping-cart"></i></a>
        <?php }else{ ?>
        <nav class="navbar">
        <a href="<?= BASE_URL . 'dang-nhap'?>">Đăng Nhập</a>
        <a href="<?= BASE_URL . 'dang-ki'?>" style="margin-left: 5px; border-left: 1px solid #666; padding-left: 5px;">Đăng kí</a>
        <a href="<?= CLIENT_ASSET ?>dist/#order"><i class="fas fa-shopping-cart"></i></a>
      </nav>
      <?php } ?>
      </div>
      
    </header>

    <!-- header section ends -->

    <!-- main --><?php include $view;?>

    <!-- footer section  -->

    <section class="footer">
      <div class="share">
        <a href="<?= CLIENT_ASSET ?>dist/#" class="btn">facebook</a>
        <a href="<?= CLIENT_ASSET ?>dist/#" class="btn">twitter</a>
        <a href="<?= CLIENT_ASSET ?>dist/#" class="btn">instagram</a>
        <a href="<?= CLIENT_ASSET ?>dist/#" class="btn">pinterest</a>
        <a href="<?= CLIENT_ASSET ?>dist/#" class="btn">linkedin</a>
      </div>

      <h1 class="credit">
        created by <span> N6 </span> | all rights reserved!
      </h1>
    </section>


    <!-- loader  -->
    <div class="loader-container">
      <img src="<?= CLIENT_ASSET ?>dist/images/loader.gif" alt="" />
    </div>

    <!-- custom js file link  -->
    <script src="<?= CLIENT_ASSET ?>dist/js/script.js"></script>
  </body>
</html>

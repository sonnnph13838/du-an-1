<div class="mgt-dn cnter">
<div class="wrapper form-dk">
    <h3>Đăng nhập</h3>
    <form action="post-login" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="text" name="email" placeholder="Email Address">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
      </div>

      <div class="field password">
        <div class="input-area">
          <input type="password" name="mat_khau" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
      </div>


      <div class="remember">
          <input type="checkbox" name="" id="" class="check-remember"> Ghi nhớ tài khoản
      </div>
      <div class="pass-txt"><a href="<?= BASE_URL .'quen-mk'?>">Quên mật khẩu</a></div>
      <input type="submit" name="dangnhap" value="Đăng nhập">
    </form>
    <div class="sign-txt">Bạn chưa có tài khoản? <a href="client-dangki">Đăng kí ngay</a></div>
</div>
</div>
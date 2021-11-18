<div class="mgt-dn cnter">
<div class="wrapper">
    <h3>Login Form</h3>
    <form action="dangnhap" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="text" name="tai_khoan" placeholder="Tài Khoản">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Nhập Tài khoản</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" name="mat_khau" placeholder="Mật Khẩu">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Nhập Mật Khẩu</div>
      </div>
      <div class="remember">
          <input type="checkbox" name="" id="" class="check-remember"> Ghi nhớ tài khoản
      </div>
      <div class="pass-txt"><a href="#">Forgot password?</a></div>
    
    <div class="sign-txt">
         <input type="submit" name="dangnhap" value="đăng nhập"><br>
    </div>
    </form>
</div>
</div>
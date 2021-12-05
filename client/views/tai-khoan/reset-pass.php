<div class="mgt-dn cnter mg-fterr">
<div class="wrapper">
    <?php if(isset($_GET['msg']) && ($_GET['msg'] != "")):?>
      <div class="msg-quenmk">
      <h4><?= $_GET['msg']?></h4>
      </div>
    <?php endif?>
    <?php if(isset($_GET['msgerr']) && ($_GET['msgerr'] != "")):?>
      <div class="msg-quenmk sendmail-err">
      <h4><?= $_GET['msgerr']?></h4>
      </div>
    <?php endif?>
    
  <div class="forgot-pass">
    
    <h3>Đặt lại mật khẩu</h3>
    <form action="<?= BASE_URL . 'post-reset'?>" method="post">
      <div class="field email">
        <div class="input-area">
          <input type="hidden" name="email" value="<?= $email?>">
          <input type="password" name="mat_khau" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
      </div>

      <input type="submit" value="Gửi" name="submit">
    </form>
    <div class="sign-txt">Bạn chưa có tài khoản? <a href="client-dangki">Đăng kí ngay</a></div>
  </div>
</div>
</div>
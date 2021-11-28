<?php foreach ($sp as $gg):?>
  
    <div style="margin-top: 100px; margin-left:50px">
        <div class="container" style="display: grid; grid-template-columns: 1fr 1fr">
            <div class="detail-restaurant-img">
            <img src="<?= CLIENT_ASSET ?>dist/images/g-1.jpg" alt="" />
            </div>
            <div class="content">
            <h1>Tên Sản Phẩm:<br>
              <?=$gg['name_food']?></h1>
            <p style="margin-top: 50px; font-size:20px">Giá:<br>
            <?=$gg['price_food']?></p>
            <p style="margin-top: 50px; font-size:15px">Chi Tiết:<br>
            <?=$gg['detail_food']?></p>
            <?php endforeach ?>
            <?php foreach ($sps as $option):?>
            <button style=
            "margin-top: 50px;
            background-color: #666;
            border-radius: 5px;
            width: 100px"><?=$option['name_option']?></button>
            <p><?=$option['price_option']?></p>
            <?php endforeach ?>
            <a href="#" class="btn">ordern now</a>
          </div>
        </div>
        </div>
        
    <!-- footer section  -->
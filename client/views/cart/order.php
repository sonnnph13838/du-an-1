<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date('m/d/Y h:i:s a', time());

// if (isset($_session['email']) && (is_array($_session['email']))) {
//     extract($_session['email']);
// }else{
//    header('Location: '.BASE_URL. 'dang-nhap');
// }
    
?>


<style>
    .radiogroups {
        padding: 48px 64px;
        border-radius: 16px;
    }

    .rows {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        grid-gap: 50px;
        margin: 0 15px;
    }

    h1 {
        color: green;
        font-size: 4em;
    }

    .title {
        margin-bottom: 50px;
    }

    .form-label-group input {
        width: 100%;
        height: 40px;
        margin: 10px 0;
        padding: 0 10px;
    }

    label {
        font-size: 20px;
    }

    .time_order {
        font-size: 15px;
        margin-bottom: 20px;
    }

    .form-ct {
        margin-left: 50px;
        margin-top: 148px;
    }

    .title {
        text-align: center;
    }

    .next_pay {
        text-align: right;
    }
</style>

<?php if(!isset($_SESSION['email']) || empty($_SESSION)):?>
    <h2 class="mgt-dn" style="text-align: center;">Bạn vui lòng đăng nhập để tiếp tục thanh toán!!</h2>
<?php else:?>

<div class="mgt-dn lefa mg-fterr">
    <form action="bill" method="post">
        <div class="radiogroups">
            <div class="title" align="center">
                <h1>ĐỊA CHỈ GIAO HÀNG</h1>
            </div>
            <div class="rows">
                <div class="col">
                    <div class="time_order" name="time">
                        <h2>Thời gian đặt hàng : <?= $date ?></h2>
                    </div>
                    <div class="address_order">
                        <div class="time_order">
                            <h2>Chọn địa chỉ :</h2>
                        </div>
                        <div class="form_top">
                            <input type="hidden" name="id" value=" <?= $id_user ?>">
                            <div class="form-label-group">
                                <label for="inputFullname"><span>Họ và tên <i class="text-danger">*</i></span></label>
                                <input type="text" name="name" id="inputFullname" class="form-control" value=" <?= $name_user ?>">

                            </div>
                            <div class="form-label-group">
                                <label for="inputPhone"><span>Điện thoại <i class="text-danger">*</i></span></label>
                                <input type="text" name="tel" id="inputPhone" maxlength="10" class="form-control" value=" <?= $tel ?>">

                            </div>
                            <div class="form-label-group">
                                <label for="inputEmail"><span>Email <i class="text-danger">*</i></span></label>
                                <input type="email" name="email" id="inputEmail" class="form-control" value=" <?= $email ?>">

                            </div>
                            <div class="form-label-group">
                                <label for="inputAddress"><span>Địa chỉ <i class="text-danger">*</i></span></label>
                                <input type="text" name="address" id="inputAddress" class="form-control" value=" <?= $address ?>">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="title">
                        <h2>Chi tiết đơn hàng</h2>
                    </div>
                    <div class="form-ct">

                        <table class="table" style=" width: 90%;line-height: 1.5;font-size: 15px;">
                            <thead>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                            </thead>
                            <tbody>
                                <?php
                                $tong = 0;
                                ?>
                                <?php foreach ($listCart as $index => $c) :  ?>

                                    <tr>

                                        <td><?= $index + 1 ?> </td>

                                        <td><?= $c['name_food'] ?></td>
                                        <td>
                                            <?php $img = UPLOAD_IMAGE . $c['image_food']  ?>
                                            <img src="<?= $img ?>" alt="" width="100">
                                        </td>


                                        <td><?= number_format($c['gia'], 0, ',', '.') ?> VNĐ</td>
                                        <td>

                                            <span class="sl"><?= $c['cart_amount'] ?></span>

                                        </td>
                                        <td>
                                            <?= number_format($c['gia'] * $c['cart_amount'], 0, ',', '.') ?>
                                            VNĐ
                                        </td>

                                        <?php $tong += $c['gia'] * $c['cart_amount']; ?>

                                    </tr>
                                <?php endforeach ?>
                                <?php if (!isset($_SESSION['option']) || $_SESSION['option'] == []) : ?>
                                <?php else : ?>
                                    <?php foreach ($listoption as $index => $p) :  ?>
                                        <tr>
                                            <td>Thêm</td>

                                            <td><?= $p['name_option'] ?></td>
                                            <td>
                                                <?php $img = UPLOAD_IMAGE . $p['image']  ?>
                                                <img src="<?= $img ?>" alt="" width="100">
                                            </td>


                                            <td><?= number_format($p['discount'], 0, ',', '.') ?> VNĐ</td>
                                            <td>
                                                <span class="sl"><?= $p['quantity'] ?></span>
                                            </td>
                                            <td>
                                                <?= number_format($p['discount'] * $p['quantity'], 0, ',', '.') ?>
                                                VNĐ
                                            </td>
                                            
                                            <?php $tong += $p['discount'] * $p['quantity']; ?>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <tr>
                                    <td colspan="4" class="total"> <b>Tổng giá trị đơn hàng:<b> </td>


                                    <td></td>
                                    <td style="color: red;"> <b> <?= number_format($tong, 0, ',', '.') ?> VND </b></td>
                                    <input type="hidden" name="tong" value="<?= $tong ?>">

                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="next_pay">

                <button><input type="submit" name="next_pay" value="Tiếp tục thanh toán" style="margin: 0px;padding: 10px;"></button>

            </div>
        </div>

    </form>
    
</div>
<?php endif?>
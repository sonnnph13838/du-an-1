<style>
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
    }

    label {
        font-size: 15px;
    }

    h4 {
        font-size: 15px;
    }

    .time_order {
        font-size: 15px;
        margin-bottom: 20px;
    }

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .radiogroups {
        padding: 48px 64px;
        border-radius: 16px;
    }


    .wrappers {
        margin: 8px 0;
    }

    .state {
        position: absolute;
        top: 0;
        right: 0;
        opacity: 1e-5;
        pointer-events: none;
    }

    .label {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        color: #394a56;
    }

    .text {
        margin-left: 16px;
        transition: opacity .2s linear, transform .2s ease-out;
    }

    .indicator {
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        box-shadow:
            -8px -4px 8px 0px #ffffff,
            8px 4px 12px 0px #d1d9e6;
        overflow: hidden;
    }

    .indicator::before,
    .indicator::after {
        content: '';
        position: absolute;
        top: 10%;
        left: 10%;
        height: 80%;
        width: 80%;
        border-radius: 50%;
    }

    .indicator::before {
        box-shadow:
            -4px -2px 4px 0px #d1d9e6,
            4px 2px 8px 0px #fff;
    }

    .indicator::after {
        background-color: #ecf0f3;
        box-shadow:
            -4px -2px 4px 0px #fff,
            4px 2px 8px 0px #d1d9e6;
        transform: scale3d(1, 1, 1);
        transition: opacity .25s ease-in-out, transform .25s ease-in-out;
    }

    .state:checked~.label .indicator::after {
        transform: scale3d(.975, .975, 1) translate3d(0, 10%, 0);
        opacity: 0;
    }

    .state:focus~.label .text {
        transform: translate3d(8px, 0, 0);
        opacity: 1;
    }

    .label:hover .text {
        opacity: 1;
    }

    .address_order {
        margin-bottom: 10px;
    }

    .next_pay {
        text-align: right;
    }

    .title {
        text-align: center;
    }
</style>
<?php foreach ($bill as $bills) : ?>


    <div class="mgt-dn lefa mg-fter mg-fterr ">
        <form action="comfirmbill" method="post">
            <div class="radiogroups">
                <div class="title" align="center">
                    <h1>PHƯƠNG THỨC THANH TOÁN</h1>
                </div>
                <div class="rows">
                    <div class="col">
                        <div class="time_order">
                            <h2>Thời gian đặt hàng : <?= $bills['date'] ?></h2>
                        </div>
                        <div class="address_order">
                            <div class="time_order">
                                <h2>Địa chỉ giao hàng</h2>
                            </div>
                            <div class="form_top">
                                <input type="hidden" name="id" value=" <?= $bills['id_bill']  ?>">
                                <div class="form-label-group">
                                    <label for="inputFullname"><span>Họ và tên <i class="text-danger">:</i></span></label>
                                    <h4><?= $bills['name_bill'] ?></h4>

                                </div>
                                <div class="form-label-group">
                                    <label for="inputPhone"><span>Điện thoại <i class="text-danger">:</i></span></label>
                                    <h4><?= $bills['tel'] ?></h4>
                                </div>
                                <div class="form-label-group">
                                    <label for="inputEmail"><span>Email <i class="text-danger">:</i></span></label>
                                    <h4><?= $bills['email'] ?></h4>
                                </div>
                                <div class="form-label-group">
                                    <label for="inputAddress"><span>Địa chỉ<i class="text-danger">:</i></span></label>
                                    <h4><?= $bills['address'] ?></h4>
                                </div>

                            </div>
                        </div>
                        <div class="method_pay">
                            <div class="time_order">
                                <h2>Chọn phương thức thanh toán</h2>
                            </div>
                            <div class="radiogroup">
                                <div class="wrappers">
                                    <input class="state" type="radio" name="pttt" id="a" value="0" checked >
                                    <label class="label" for="a">
                                        <div class="indicator"></div>
                                        <span class="text">Thanh toán khi nhận hàng</span>
                                    </label>
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
                                        hi
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


                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="next_pay">
                    <button><input type="submit" name="huy" class="huy" value="Huỷ thanh toán" style="margin: 0px;padding: 10px;background:red;"></button>
                    <button><input type="submit" name="pay" value="Thanh toán" style="margin: 0px;padding: 10px;"></button>

                </div>
            </div>
        </form>
    </div>
<?php endforeach ?>
<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date('m/d/Y h:i:s a', time());
if (isset($_session['email']) && (is_array($_session['email']))) {
    extract($_session['email']);
}
?>
<style>
    .radiogroups {
        padding: 48px 64px;
        border-radius: 16px;
        background: #7fff7f;
        box-shadow:
            4px 4px 4px 0px #d1d9e6 inset,
            -4px -4px 4px 0px #ffffff inset;
    }

    .rows {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
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
</style>


    <div class="mgt-dn lefa mg-fter">
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
                        Chi tiết đơn hàng
                    </div>
                </div>
                <div class="next_pay">

                    <button><input type="submit" name="next_pay" value="Tiếp tục thanh toán" style="margin: 0px;"></button>

                </div>
            </div>

        </form>
    </div>

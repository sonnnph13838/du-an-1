<style>
    .col-12{
        margin: 0px 30px;
    }
</style>

<div class="mgt-dn lefa mg-fter mg-fterr">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table tabl-stripped">
                        <thead>
                            <th>ID</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                            
                            <th>Phương thức</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết đơn hàng</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($cates as $item) : ?>
                                <tr>
                                    <td><?= $item['id_cart'] ?></td>
                                    <td><?= $item['date'] ?></td>
                                    <td><?= $item['into_money'] ?> VNĐ</td>
                                    <?php
                                    $payment = $item['payment'];
                                    if ($item['payment'] == 0) {
                                        $payment = "Thanh toán khi nhận hàng";
                                    } elseif ($item['payment'] == 1) {
                                        $payment = "Thanh toán bằng thẻ tín dụng";
                                    } elseif ($item['payment'] == 2) {
                                        $payment = "Thanh toán bằng zaloPay";
                                    }
                                    ?>
                                    <td><?= $payment ?></td>
                                    <?php
                                    $status = $item['status'];
                                    if ($item['status'] == 0) {
                                        $status = "Chờ xử lý";
                                    } elseif ($item['status'] == 1) {
                                        $status = "Đang giao hàng";
                                    } elseif ($item['status'] == 2) {
                                        $status = "Đã nhận hàng";
                                    } elseif ($item['status'] == 3) {
                                        $status = "Trả lại hàng";
                                    }
                                    ?>
                                    <td><?= $status ?></td>
                                    <td> <a href="<?= BASE_URL . 'client/user/bill-user/ctdh?id=' . $item['id_cart']  ?>">Xem chi tiết</a> </td>
                                    <?php if($item['status'] == 0){  ?>
                                        <td>
                                            <a onclick="if (!confirm('Bạn chắc chắn muốn huỷ đơn hàng ?')) { return false }" href="<?= 'huy-don?id=' . $item['id_bill'] ?>">Huỷ đơn</a>
                                        </td>
                                    <?php }else{ ?>
                                        <td>
                                            <p>Không thể huỷ đơn</p>
                                        </td>
                                    <?php } ?>
                                    
                              </tr>
                              <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .col-12{
        margin: 0px 30px;
    }
</style>
<div class="mgt-dn lefa mg-fter">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table tabl-stripped">
                        <thead>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Đia chỉ</th>
                            <th>SĐT</th>
                            <th>Phương thức</th>
                            <th>Tổng</th>
                            <th>Ngày</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($cates as $item) : ?>
                                <tr>
                                    <td><?= $item['id_bill'] ?></td>
                                    <td><?= $item['name_bill'] ?></td>
                                    <td><?= $item['address'] ?></td>
                                    <td><?= $item['tel'] ?></td>
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
                                    <td><?= $item['total'] ?> VNĐ</td>
                                    <td><?= $item['date'] ?></td>
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
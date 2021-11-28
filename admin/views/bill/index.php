<!-- <style>
    table {
        width: 100%;
    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
        color: red;
    }
</style> -->
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="keyword" value="<?=$keyword ?>" class="form-control" placeholder="Tìm kiếm..." aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                    </thead>
                    <tbody>
                        <?php foreach ($cates as $item) : ?>
                        <tr>
                            <td><?= $item['id_bill'] ?></td>
                            <td><?= $item['name_bill'] ?></td>
                            <td><?= $item['address'] ?></td>
                            <td><?= $item['tel'] ?></td>
                            <?php 
                            $payment = $item['payment'] ;
                            if($item['payment'] == 0){
                                $payment = "Thanh toán khi nhận hàng";
                            }elseif($item['payment'] == 1){
                                $payment = "Thanh toán bằng thẻ tín dụng";
                            }elseif($item['payment'] == 2){
                                $payment = "Thanh toán bằng zaloPay";
                            }
                            ?>
                            <td><?= $payment ?></td>
                            <td><?= $item['total'] ?></td>
                            <td><?= $item['date'] ?></td>
                            <?php 
                            $status = $item['status'] ;
                            if($item['status'] == 0){
                                $status = "Chờ xử lý";
                            }elseif($item['status'] == 1){
                                $status = "Đang giao hàng";
                            }elseif($item['status'] == 2){
                                $status = "Đã lấy hàng";
                            }elseif($item['status'] == 3){
                                $status = "Trả lại hàng";
                            }
                            ?>
                            <td><?=  $status ?> <a href="<?= ADMIN_URL . 'bill/edit-status?id='. $item['id_bill'] ?>"><i class="fas fa-edit"></i></a></td>
                           
                            <td>
                                <a href="javascript:;"
                                    onclick="confirm_remove('<?= ADMIN_URL . 'bill/del-bill?id='. $item['id_bill'] ?>', '<?= $item['name_bill']?>')"
                                    class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>


                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
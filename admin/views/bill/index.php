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
                        <th>Tên đơn</th>
                        <th>Đia chỉ</th>
                        <th>SĐT</th>
                        <th>Phương thức</th>
                        <th>Tổng</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Mã Người dùng</th>
                    </thead>
                    <tbody>
                        <?php foreach ($cates as $item) : ?>
                        <tr>
                            <td><?= $item['id_bill'] ?></td>
                            <td><?= $item['name_bill'] ?></td>
                            <td><?= $item['address'] ?></td>
                            <td><?= $item['tel'] ?></td>
                            <td><?= $item['payment'] ?></td>
                            <td><?= $item['total'] ?></td>
                            <td><?= $item['date'] ?></td>
                            <td><?= $item['status'] ?></td>
                            <td><?= $item['id_user'] ?></td>
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
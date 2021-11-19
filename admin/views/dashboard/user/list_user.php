<style>
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
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control" placeholder="Tìm kiếm..." aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Vai trò</th>
                        <th> <a href="<?= ADMIN_URL . '#'?>" class="btn btn-sm btn-success">Tạo mới</a></th>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $ds) : ?>
                            <tr>
                                <td><?= $ds['id'] ?></td>
                                <td><?= $ds['ho_ten'] ?></td>
                                <td><?= $ds['email'] ?></td>
                                <td><?= $ds['dia_chi'] ?></td>
                                <td><?= $ds['sdt'] ?></td>
                                <?php
                                $role = $ds['vai_tro'];
                                if ($role == 0) {
                                    $role = "Khách hàng";
                                } else {
                                    $role = "Nhân viên";
                                }
                                ?>
                                <td><?= $role ?> <br>

                                    <a href="update_role?id=<?= $ds['id'] ?>">Sửa vai trò</a>
                                </td>
                                <td>
                                    <a onclick="if (!confirm('Bạn chắc chắn ?')) { return false }" href="del_user?id=<?= $ds['id'] ?>"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
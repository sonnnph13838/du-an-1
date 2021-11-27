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
                                <td><?= $ds['id_user'] ?></td>
                                <td><?= $ds['name_user'] ?></td>
                                <td><?= $ds['email'] ?></td>
                                <td><?= $ds['address'] ?></td>
                                <td><?= $ds['tel'] ?></td>
                                <?php
                                $role = $ds['role'];
                                if ($role == 0) {
                                    $role = "Khách hàng";
                                } else {
                                    $role = "Nhân viên";
                                }
                                ?>
                                <td><?= $role ?> <br>

                                    <a href="<?= ADMIN_URL . 'user/check_role?id='. $ds['id_user'] ?>">Sửa vai trò</a>
                                </td>
                                <td>
                                <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'user/del_user?id='. $ds['id_user'] ?>', '<?= $ds['email']?>')" class="btn btn-sm btn-danger">
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
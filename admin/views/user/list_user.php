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
                <form action="" method="get">
                    <div class="row">
                    <div class="col-6">
                            <div class="form-group" >
                                <select name="loc" id="" style="border: none;" >
                                    <option value="">Lọc</option>
                                    <option value="1">Nhân viên</option>
                                    <option value="0">Khách hàng</option>
                                </select>
                                <input type="submit" class="btn btn-sm btn-info" value="Tìm kiếm">
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
                        <th>Hình ảnh</th>
                        <th>email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Vai trò</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $ds) : ?>
                            <tr>
                                <td><?= $ds['id_user'] ?></td>
                                <td><?= $ds['name_user'] ?></td>
                                <td><?php $img = UPLOAD_IMAGE . $ds['image']  ?>
                                    <img src="<?= $img ?>" width="150">
                                </td>
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

                            
                                </td>
                                <td>
                                <a href="<?= ADMIN_URL . 'user/edit_user?id=' . $ds['id_user'] ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
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
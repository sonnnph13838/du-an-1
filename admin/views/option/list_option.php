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
                        <th>Tên món ăn</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Giá khuyến mãi</th>

                        <th> <a href="<?= ADMIN_URL . 'option/add_option' ?>" class="btn btn-sm btn-success">Tạo mới</a></th>
                    </thead>
                    <tbody>
                        <?php foreach ($list_option as $ds) : ?>
                            <tr>
                                <td><?= $ds['id_option'] ?></td>
                                <td><?= $ds['name_option'] ?></td>
                                <td><?php $img = UPLOAD_IMAGE . $ds['image']  ?>
                                    <img src="<?= $img ?>" width="150">
                                </td>
                                <td><?= $ds['price'] ?></td>
                                <td><?= $ds['discount'] ?></td>
                                <td>
                                    <a href="<?= ADMIN_URL . 'option/edit_option?id=' . $ds['id_option'] ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'option/del_option?id=' . $ds['id_option'] ?>', '<?= $ds['name_option'] ?>')" class="btn btn-sm btn-danger">
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

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
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th><a href="<?= ADMIN_URL .'banner/add-banner'?>" class="btn btn-sm btn-success">Thêm mới</a></th>
                    </thead>
                    <tbody>
                        <?php foreach ($listbanner as $index => $bn) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?php $img = UPLOAD_IMAGE . $bn['image']  ?>
                                    <img src="<?= $img ?>" width="150">
                                </td>
                                <td>
                                <a href="<?= ADMIN_URL . 'banner/edit-banner?id=' . $bn['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="<?= ADMIN_URL . 'banner/remove-banner?id=' . $bn['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
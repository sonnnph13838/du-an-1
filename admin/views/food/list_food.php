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
                                <select name="category" id="" style="border: none;">
                                    <option value="">Lọc</option>
                                    <?php
                                    foreach ($list_category as  $u) {
                                        extract($u);
                                        echo  '<option value="' . $u['id_category'] . '">' . $u['name_category']  . '</option>';
                                    }
                                    ?>
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
                        <th>Tên món ăn</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Giá khuyến mãi</th>
                        <th>Chi tiết</th>
                        <th>Số lượt xem</th>
                        <th>Tên danh mục</th>

                        <th> <a href="<?= ADMIN_URL . 'food/add_food' ?>" class="btn btn-sm btn-success">Tạo mới</a></th>
                    </thead>
                    <tbody>
                        <?php foreach ($list_food as $ds) : ?>
                            <tr>
                                <td><?= $ds['id_food'] ?></td>
                                <td><?= $ds['name_food'] ?></td>
                                <td><?php $img = UPLOAD_IMAGE . $ds['image_food']  ?>
                                    <img src="<?= $img ?>" width="150">
                                </td>
                                <td><?= $ds['price_food'] ?></td>
                                <td><?= $ds['discount_food'] ?></td>
                                <td><?= $ds['detail_food'] ?></td>
                                <td><?= $ds['views_food'] ?></td>
                                <td><?php foreach ($list_category as $i) : ?>
                                        <?php
                                        if ($i['id_category'] == $ds['id_type']) {
                                            echo $i['name_category'];
                                        }
                                        ?>
                                    <?php endforeach; ?></td>
                                <td>
                                    <a href="<?= ADMIN_URL . 'food/edit_food?id=' . $ds['id_food'] ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'food/del_food?id=' . $ds['id_food'] ?>', '<?= $ds['name_food'] ?>')" class="btn btn-sm btn-danger">
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
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
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>content</th>
                    </thead>
                    <tbody>
                        <?php foreach ($list_feedback as $ds) : ?>
                            <tr>
                                <td><?= $ds['first_name'] ?></td>
                                <td><?= $ds['last_name'] ?></td>
                                <td><?= $ds['email'] ?></td>
                                <td><?= $ds['phone'] ?></td>
                                <td><?= $ds['content'] ?></td>
                                <td>
                                    <a href="<?= ADMIN_URL . 'reply?id=' . $ds['id'] ?> " class="btn btn-sm btn-info"><i class="far fa-comments"></i>reply</i></a>
                                    
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
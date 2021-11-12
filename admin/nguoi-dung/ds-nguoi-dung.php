
<table border="1">
    <thead>
        <th>ID</th>
        <th>Tài khoản</th>
        <th>Họ tên</th>
        <th>Mật khẩu</th>
        <th>email</th>
        <th>Địa chỉ</th>
        <th>SĐT</th>
        <th>Vai trò</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($ds_nguoi_dung as $ds): ?>
            <tr>
                <td><?= $ds['id'] ?></td>
                <td><?= $ds['tai_khoan'] ?></td>
                <td><?= $ds['ho_ten'] ?></td>
                <td><?= $ds['mat_khau'] ?></td>
                <td><?= $ds['email'] ?></td>
                <td><?= $ds['dia_chi'] ?></td>
                <td><?= $ds['sdt'] ?></td>
                <td><?= $ds['vai_tro'] ?></td>
                <td>
                <a onclick="if (!confirm('Bạn chắc chắn ?')) { return false }" href="xoa_nguoi_dung?id=<?= $ds['id'] ?>">Xoá</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
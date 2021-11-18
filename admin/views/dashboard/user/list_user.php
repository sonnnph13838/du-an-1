<style>
    table {
        width: 100%;
    }
    td{
        text-align: center;
    }
    th{
        text-align: center;
        color : red;
    }
</style>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Tài khoản</th>
        <th>Họ tên</th>
        <th>email</th>
        <th>Địa chỉ</th>
        <th>SĐT</th>
        <th>Vai trò</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($list_user as $ds): ?>
            <tr>
                <td><?= $ds['id'] ?></td>
                <td><?= $ds['tai_khoan'] ?></td>
                <td><?= $ds['ho_ten'] ?></td>   
                <td><?= $ds['email'] ?></td>
                <td><?= $ds['dia_chi'] ?></td>
                <td><?= $ds['sdt'] ?></td>
                <?php
                $role = $ds['vai_tro'];
                if($role == 0){
                    $role = "Khách hàng";
                }else{
                    $role = "Nhân viên";
                }
                ?>
                <td><?= $role ?> <br>
                
                <a href="update_role?id=<?= $ds['id']?>">Sửa vai trò</a></td>
                <td>
                <a onclick="if (!confirm('Bạn chắc chắn ?')) { return false }" href="del_user?id=<?= $ds['id']?>">Xoá</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
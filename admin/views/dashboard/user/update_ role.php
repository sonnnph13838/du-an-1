<style>
    form {
        text-align: center;
    }
</style>
<form action="update_role/update" method="post">
    <input type="radio" value="0" name="role">Khách hàng
    <input type="radio" value="1" name="role">Nhân viên<br>
    <?php foreach ($list_user as $ds): ?>
    <input type="hidden" name="id" value="<?= $ds['id']?>">
    <?php endforeach ?>
    <input type="submit" name="update" value="Sửa">
</form>
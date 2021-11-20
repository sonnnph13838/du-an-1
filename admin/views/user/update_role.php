<style>
    form {
        text-align: center;
    }
</style>
<form action="<?= ADMIN_URL . 'user/update_role/update' ?>" method="post">
    <input type="radio" value="0" name="role">Khách hàng
    <input type="radio" value="1" name="role">Nhân viên<br>
    <input type="hidden" name="id" value="<?= $_GET['id']?>">
    <input type="submit" name="update" value="Sửa">
</form>

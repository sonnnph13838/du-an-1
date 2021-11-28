<style>
    form {
        text-align: center;
    }
</style>
<form action="<?= ADMIN_URL . 'bill/edit_status/edit' ?>" method="post">
    <input type="radio" value="0" name="status">Chờ xử lý<br>
    <input type="radio" value="1" name="status">Đang giao hàng<br>
    <input type="radio" value="2" name="status">Đã lấy hàng<br>
    <input type="radio" value="3" name="status">Trả lại hàng<br>
    <input type="hidden" name="id" value="<?= $_GET['id']?>">
    <input type="submit" name="update" value="Sửa">
</form>

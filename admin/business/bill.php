<?php
function list_bill(){
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "select * from bill where name_bill like '%$keyword%'";
    $cates = executeQuery($sql, true);

    // hiển thị view
    admin_render('bill/index.php', compact('cates','keyword'),'admin-assets/costom/category_index.js');
}
function del_bill(){
    $id = $_GET['id'];
    $sql = "delete from bill where id_bill = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'bill');
}
?>
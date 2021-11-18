<?php
$id = $_POST['id'];
$role = $_POST['role'];
if ($role == 0) {
    $sql = "UPDATE nguoi_dung SET vai_tro = 0 where  id = '$id'";
    pdo_execute($sql);
} elseif ($role == 1) {
    $sql = "UPDATE nguoi_dung SET vai_tro = 1 where  id =  '$id'";
    pdo_execute($sql);
}
header('Location: ./admin-user');
?>

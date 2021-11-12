<?php
include '../../model/pdo.php';
include '../../model/nguoi-dung.php';
if(isset($_GET['id'])&& ($_GET['id']>0)){
    xoa_nguoi_dung($_GET['id']);
}
header('location: ds-nguoi-dung.php');
?>
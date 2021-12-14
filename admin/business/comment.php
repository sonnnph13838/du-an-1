<?php

function list_cmt()
{
	$sql = "SELECT comment.*,food.name_food,user.name_user FROM comment JOIN food ON comment.id_food=food.id_food JOIN user ON comment.id_user=user.id_user";
	$listcmt = executeQuery($sql, true);
	admin_render('comment/comment.php', compact('listcmt'));
}
function xoa()
{
	if (isset($_GET['id']) && ($_GET['id']) >= 0) {
		$id = $_GET['id'];
		$sql = "delete from comment where id_cm=" . $id;
		executeQuery($sql);
		
	}
	header('Location: ' . ADMIN_URL . 'list-comment');
}
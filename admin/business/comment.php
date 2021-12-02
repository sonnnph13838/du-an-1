<?php

function list_cmt()
{
	$sql = "select * from comment";
	$listcmt = executeQuery($sql, true);
	admin_render('comment/comment.php', compact('listcmt'));
}
function xoa()
{
	if (isset($_GET['id']) && ($_GET['id']) >= 0) {
		$id = $_GET['id'];
		$sql = "delete from comment where id_cm=" . $id;
		executeQuery($sql);
		header('Location: ' . ADMIN_URL . 'list-comment');
	}
}
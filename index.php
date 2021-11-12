<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
include "./model/pdo.php";
include "./model/nguoi-dung.php";
include "view/post-dang-ki.php";
switch ($url) {
	case 'dang-ki':
		require_once "./view/dang-ki.php";
		break;
	case 'post-dang-ki':
		require_once "view/post-dang-ki.php";
		break;
	default:
		# code...
		break;
}
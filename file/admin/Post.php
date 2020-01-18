<?php
require "ClassDatabase.php";
require "library.php";
//print_r(expression)
// var_dump($_POST);

switch ($_POST['method']) {
	case 'create':
	$posts = new Library();
	$image = $posts -> uploadImages("../public/img/news/thumbnail/".$_POST['tags']."/",$_POST
		["img"]);
	$posts -> newsMethod($_POST['method'],$image);
	// echo $image;de...
	break;
	case 'delete':
	$response = "";
	$posts = new Library();
	$response = $posts->newsMethod($_POST['method'],'',$_POST['id']);
	exit($response);
	default:
		# code...
	break;
}

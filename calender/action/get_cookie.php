<?php 
	$cookie = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
	if($cookie){
		$cookie = (str_rot13(base64_decode(str_rot13($cookie))));
		$cookie = explode(',', $cookie);
		die($cookie[0]);
	}

 ?>
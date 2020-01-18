<?php 
	$cookie = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
	setcookie('user', $cookie, time()-60*60*24*30);
 ?>
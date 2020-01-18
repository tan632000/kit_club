<?php 
session_start();
	require "../models/database_action.php";
	$data = new Database();
	$massage = isset($_POST['massage']) ? $_POST['massage'] : '1';
	if($massage == '0'){
		$cookie = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
		$cookie = (str_rot13(base64_decode(str_rot13($cookie))));
		$cookie = explode(',', $cookie);
		$result = $data->get_data_tkb($cookie[0]);
		if($result){
			die($result['text']);
		}	
	}
	else if($massage == '1'){
		die($data -> get_all_data());
	} 
	else if($massage == '2'){
		die($_SESSION['user']['student_text']);	
	}

 ?>	

<?php
	require ("ClassDatabase.php");
	require ("mailer.php");
	$mails = array();
	$Mail = new Mail();
	$mails = $Mail->splitMail($_POST['listMail']);
	for($i=0;$i<count($mails);$i++){
		$Mail->addBCC($mails[$i]);
	}
	if($Mail->sendMail($_POST['mailContent'],"Thông Báo",$_POST["title"])){
		echo 1;
	}
	else{
		echo 0;
	}
	
?>
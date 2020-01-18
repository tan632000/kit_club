<?php
	function checkPass($password){
		if( strlen($password ) > 20 ) {
			return "Password too long!";
		}
		if( strlen($password ) < 8 ) {
			return "Password too short!";
		}

		if( !preg_match("/[0-9]+/", $password ) ) {
			return "Password must include at least one number!";
		}

		if( !preg_match("/[a-z]+/", $password ) ) {
			return "Password must include at least one letter!";
		}

		if( !preg_match("/[A-Z]+/", $password ) ) {
			return "Password must include at least one CAPS!";
		}

		if( preg_match("/\W+/", $password ) ) {
			return "Password NOT include symbol!";
		}
	}

 ?>
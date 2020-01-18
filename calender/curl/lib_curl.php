<?php 
	class cURL { 
		var $headers; 
		var $user_agent; 
		var $compression; 
		var $cookie_file; 
		var $proxy; 
		function __construct($cookies=TRUE,$compression='gzip') { 
			$this->headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg'; 
			$this->headers[] = 'Connection: Keep-Alive'; 
			$this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8'; 
			$this->user_agent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)'; 
			$this->compression=$compression; 
		} 
		 
		function get($url) { 
			$process = curl_init($url); 
			curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers); 
			curl_setopt($process, CURLOPT_HEADER, 0); 
			curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent); 
			curl_setopt($process, CURLOPT_COOKIEFILE, dirname(__FILE__).'/cookies.txt'); 
			curl_setopt($process, CURLOPT_COOKIEJAR,  dirname(__FILE__).'/cookies.txt'); 
			curl_setopt($process,CURLOPT_ENCODING , $this->compression); 
			curl_setopt($process, CURLOPT_TIMEOUT, 30); 
			curl_setopt($process, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1); 
			$return = curl_exec($process); 
			curl_close($process); 
			return $return; 
		} 
		function post($url,$data) { 
			$process = curl_init($url); 
			curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers); 
			curl_setopt($process, CURLOPT_HEADER, 0); 
			curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent); 
			curl_setopt($process, CURLOPT_COOKIEFILE, dirname(__FILE__).'/cookies.txt'); 
			curl_setopt($process, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookies.txt'); 
			curl_setopt($process, CURLOPT_ENCODING , $this->compression); 
			curl_setopt($process, CURLOPT_TIMEOUT, 30); 
			curl_setopt($process, CURLOPT_POSTFIELDS, $data); 
			curl_setopt($process, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1); 
			curl_setopt($process, CURLOPT_POST, 1); 
			$return = curl_exec($process); 
			curl_close($process); 
			return $return; 
		} 
		function error($error) { 
			echo "<center><div style='width:500px;border: 3px solid #FFEEFF; padding: 3px; background-color: #FFDDFF;font-family: verdana; font-size: 10px'><b>cURL Error</b><br>$error</div></center>"; 
			die; 
		} 
	} 
?> 
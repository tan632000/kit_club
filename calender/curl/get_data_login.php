<?php  
	
	class get
	{
		private $__VIEWSTATE;
		private $__EVENTVALIDATION;
		private $user;
		private $pass;
		private $btnSubmit;
		private $data;
		
		function __construct(){
			require_once "lib_curl.php";
			$this->curl=new cURL();
		}

		public function get_data($url){
			$response=$this->curl->get($url);
			$preg='/name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" \/>/';
			if(preg_match($preg, $response, $match)){
				$this->__VIEWSTATE=$match[1]; // get viewstate 
			}

			$preg='/name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="(.*?)" \/>/';
			if(preg_match($preg, $response, $match)){
				$this->__EVENTVALIDATION=$match[1];  //get eventvalydation 
			}

			// những input cần submit 
			$this->__VIEWSTATE=urlencode($this->__VIEWSTATE);
			$this->__EVENTVALIDATION=urlencode($this->__EVENTVALIDATION);
			$this->user=isset($_POST['username']) ? $_POST['username'] : "" ;
			$this->pass=md5(isset($_POST['password']) ? $_POST['password'] : "");
			$this->btnSubmit=urlencode('Đăng nhập');
			$this->data="__VIEWSTATE=".$this->__VIEWSTATE."&__EVENTVALIDATION=".$this->__EVENTVALIDATION."&txtUserName=".$this->user."&txtPassword=".$this->pass."&btnSubmit=".$this->btnSubmit."";
			return $this->data;
		} 


		function post_data($url){
			$data=$this->get_data($url);
			$response=$this->curl->post($url,$data);
			return $response;
		}

		function get_data_tkb($url){
			$response=$this->curl->get($url);
			return $response;
		}
	}

 ?>
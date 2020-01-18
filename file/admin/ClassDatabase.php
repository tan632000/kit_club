<?php
	// class xử lí database
class Database{
	public $connect = NULL;

	private $host = 'localhost',
			$username = 'root',
			$password = '',
			$db_name = 'webkit';

	public function connect(){
		$this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
		mysqli_set_charset($this->connect,"utf8");
	}

	public function disconnect(){
		if($this->connect){
			mysqli_close($this->connect);
		}
	}

	public function query($sql){
		if($this->connect){
			mysqli_query($this->connect,$sql) or die('Lỗi câu truy vấn');
		}
	}

	public function rows($sql){
		if($this->connect){
			$query = mysqli_query($this->connect,$sql);
			if($query){
				return $row = mysqli_num_rows($query);
			}
		}
	}
	
}

?>
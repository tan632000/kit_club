<?php
	// class xử lí database
class Database{
	public $connect = NULL;

	private $host = 'localhost',
			$username = 'root',
			$password = '',
			$db_name = 'web_kit';
	public function connect(){
		$this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
	}
	public function disconnect(){
		if($this->connect){
			mysqli_close($this->connect);
		}
	}
	public function query($sql){
		if($this->connect){
			mysqli_query($this->connect,$sql);
		}
	}


}

?>
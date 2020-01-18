<?php 
	class Database{
		private $conn = NULL;
		function __construct(){
			try{
				$this->conn = new PDO('mysql:host=localhost;dbname=web_kit' , 'root' , ''); 
				$this->conn->exec('SET NAMES "utf8"');
			}catch(PDOException $e){
				die($e -> getMessgae());
			}
		} 

		function connect(){
			return $this->conn;
		}
		// add one username
		function create($nameStudent , $username , $password , $text){
			try{
				$sql = "INSERT INTO tkb (fullname , username,password,text) VALUES (? ,? ,? ,? )";
				$temp = $this->conn->prepare($sql);
				return $temp -> execute(array($nameStudent , $username,$password,$text));
			}catch(PDOException $e){
				message_($e, 0);
			}
		}

		function update($id , $username, $nameStudent , $password , $text){
			$sql = "UPDATE users SET student_id = ? ,student_name = ?, student_password = ? , student_text = ? WHERE id = ? ";
			$temp = $this->conn->prepare($sql);
			return $temp-> execute(array($username,$nameStudent,  $password , $text , $id));
		}

		function get_all_data(){
			try{
				$sql = "SELECT * FROM users";
				$temp = $this ->conn->prepare($sql);
				$temp->execute();
				$studentList = $temp -> fetchAll();
				$data = null;
				foreach ( $studentList as $key_0 => $result) {	
					if($result['student_text'] == '') continue;		
					$student = json_decode($result["student_text"] , true);
					
					foreach ($student['data'] as $key_1 => $value_1) {						
						foreach ($value_1 as $key_2 => $value_2) {
							$data['data'][$result['student_name']][$key_1][$key_2] = $student['data'][$key_1][$key_2]['lesson'];
						}
					}
				}
				
				$data = json_encode($data, JSON_UNESCAPED_UNICODE);
				return $data;
			}catch(PDOException $e){
				message_($e,0);
			}
		}
		// get data from database
		function get_data_tkb($username){
			try{
				$sql = "SELECT * FROM tkb WHERE username = ?";
				$temp = $this->conn->prepare($sql);
				$temp -> execute(array($username));
				return $temp -> fetch();
			}catch(PDOException $e){
				message_($e, 0);
			}
		}

		function get_data_kit($id){
			try{
				$sql = "SELECT * FROM users WHERE id = ?";
				$temp = $this->conn->prepare($sql);
				$temp -> execute(array($id));
				return $temp -> fetch();
			}catch(PDOException $e){
				message_($e, 0);
			}
		}

	}


 ?>
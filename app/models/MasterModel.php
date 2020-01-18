<?php
	/**
	 * @package		web_clbkit
	 * @author 		Team_web
	 * @copyright 	Copyright (c) 10/2019
	 * @since 		Version 1.0
 	 * @filesource 		models/user.php
	 */
	class MasterModel{

		//Module view All
		public static function get_all_from($table, $options = array() ){

			/**
			 * Hàm lấy tất cả các record trong bảng $table thỏa mãn điều kiện $options;
			 */

			// Xử lý $options
			$select =  isset( $options['select'] ) ? $options['select'] : '*';
			$where = isset ( $options['where'] ) ? 'WHERE '. $options['where'] : '';
			$order_by = isset ( $options['order_by'] ) ? 'ORDER BY '.$options['order_by'] : '';
			$limit = isset( $options['offset'] )  && isset($options['limit']) ? 'LIMIT '.$options['offset'].',' .$options['limit'] : '';
			

			//Truy vấn
			$query = "SELECT $select FROM $table $where ORDER BY id DESC $limit ";
	
			$results = mysqli_query(Database::$dbc,$query);
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				while($data = mysqli_fetch_array($results,MYSQLI_ASSOC)){
					$rows[]=$data;
				}
				if(!empty($rows)){
					return $rows;
				}

			}
			

		}
	

		//Module Search
		public  function search_record($keysearch){
			$query = "SELECT * FROM products WHERE name LIKE '%$keysearch%' ORDER BY id DESC";
			$results= mysqli_query(Database::$dbc,$query);
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				while($data = mysqli_fetch_array($results,MYSQLI_ASSOC)){
					$rows[]=$data;
				}
				if(!empty($rows)){
					return $rows;
				}

			}
		
		}
		//Phân trang search
		public  function search_record_with_limit($start,$limit, $keysearch){
			$query = "SELECT * FROM products WHERE name LIKE '%$keysearch%' ORDER BY id DESC LIMIT $start,$limit";
			$results= mysqli_query(Database::$dbc,$query);
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				while($data = mysqli_fetch_array($results,MYSQLI_ASSOC)){
					$rows[]=$data;
				}
				if(!empty($rows)){
					return $rows;
				}

			}
		
		}		





		public function add_user($user){

			$query="INSERT INTO users(id,fullname, username, password, email,phone,class,role,student_id,avatar,date_of_birth,gender) 
				VALUES('null', '" .$user["fullname"]. "','" .$user["username"]. "','" .$user["password"]. "','" .$user["email"]. "','" .$user["phone"]. "','" .$user["class"]. "','" .$user["role"]. "','" .$user["student_id"]. "','" .$user["avatar"]. "','" .$user["year"]. "-" .$user["month"]. "-" .$user["day"]. "','" .$user["gender"]. "')";

			
        	$results = mysqli_query( Database::$dbc, $query );

        	if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return true;
        	}

		}

		public function check_user($user){
			
			$query = " SELECT * FROM users WHERE  username = '{$user['username'] }' and password = '{$user['password']}' ";

			$results = mysqli_query( Database::$dbc, $query );
			
			if(!$results){
        		return FALSE;
        	}
        	else{
				$dataUser = mysqli_fetch_array($results,MYSQLI_ASSOC)	;
        		return $dataUser;
        	}
		}


		public function all_user_order($user){

			$query_order = "SELECT * FROM orders WHERE name = '{$user['name']}' and email = '{$user['email']}' and address = '{$user['address']}' and phone = '{$user['phone']}'   ";

			$results_order = mysqli_query( Database::$dbc, $query_order );

			if(!$results_order){
					return NULL;
			}
			else{
				
				while($data_order = mysqli_fetch_array($results_order,MYSQLI_ASSOC)){
					$rows_order[]=$data_order;
				}

				if( isset($rows_order) && count($rows_order)>0 ){

					for($i =1 ; $i<= count($rows_order);$i++ ){

						$query_detail = "SELECT order_detail.order_id, order_detail.product_id, order_detail.number_product, products.id, products.name, products.price FROM order_detail, products WHERE order_detail.order_id = '{$rows_order[$i-1]['id']}' and products.id = order_detail.product_id ";

						$results_detail = mysqli_query( Database::$dbc, $query_detail );

						while($data_detail = mysqli_fetch_array($results_detail,MYSQLI_ASSOC)){
								$rows_detail[]=$data_detail;
							}

					}
					return $rows_detail;
					
				}


			}

		}
		


		public function get_user_by_id($id) {
			$query = " SELECT * FROM users WHERE  id = '$id' ";

			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
        		return FALSE;
        	}
        	else{
        		$dataUser = mysqli_fetch_array($results,MYSQLI_ASSOC)	;
        		return $dataUser;
        	}
		}

		public function user_update($edit) {
			$query = "UPDATE users SET fullname= '{$edit['fullname']}',username= '{$edit['username']}',password= '{$edit['password']}',phone= '{$edit['phone']}',avatar= '{$edit['avatar']}' WHERE id = {$edit['id']} ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return TRUE;
        	}


			// 	$query_update = "UPDATE users SET name='$name', address='$address', phone='$phone' WHERE id='$user_id'";
			// 	$result = mysqli_query(Database::$dbc, $query_update);
			// 	if(!$result){
	        // 		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
	        // 	}
	        // 	else{
	        // 		$user = $this->get_user_by_id($user_id);
	        // 		$_SESSION['user']['name'] = $user['name'];
	        // 		$_SESSION['user']['phone'] = $user['phone'];
	        // 		$_SESSION['user']['address'] = $user['address'];
	        // 		return true;
	        // 	}
			// }
			// if (isset($data['user_update_avatar'])) {
			// 	$avatar = $data['file_name'];
			// 	$user_id = $_SESSION['user']['id'];
			// 	$query_update = "UPDATE users SET avatar='$avatar' WHERE id='$user_id'";
			// 	$result = mysqli_query(Database::$dbc, $query_update);
			// 	if(!$result){
	        // 		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
	        // 	}
	        // 	else{
	        // 		$user = $this->get_user_by_id($user_id);
	        // 		$_SESSION['user']['avatar'] = $user['avatar'];
	        // 		return true;
	        // 	}
			 
		}
// cắt chuỗi mô tả nội dung trang index
			public function textShort($text, $limit=10){
				$text = $text." ";
				$text = substr($text, 0, $limit);
				$text = substr($text, 0, strrpos($text, ' '));
				$text = $text.".....";
				return $text;
			}

			// get new by id
			public function get_new_by_id($id) {
				$query = " SELECT * FROM news WHERE  id = '$id' ";
	
				$results = mysqli_query( Database::$dbc, $query );
	
				if(!$results){
					return FALSE;
				}
				else{
					$dataNew = mysqli_fetch_array($results,MYSQLI_ASSOC)	;
					return $dataNew;
				}
			}
	


		
	}
<?php
	
	class MasterModel{


		
		public function add_user($user){
				if($user["role"]==1)
				$user["role"]=' Ban nhân sự';
				if($user["role"]==2)
				$user["role"]=' Ban truyền thông';
				if($user["role"]==3)
				$user["role"]=' Ban sự kiện';
				if($user["role"]==4)
				$user["role"]=' Ban hậu cần';
				if($user["role"]==5)
				$user["role"]='Ad truyền thông';
				if($user["role"]==6)
				$user["role"]='Admin';
			$query="INSERT INTO users(id,fullname, username, password, email,phone,class,role,avatar,date_of_birth,gender) 
				VALUES('null', '" .$user["fullname"]. "','" .$user["username"]. "','" .$user["password"]. "','" .$user["email"]. "','" .$user["phone"]. "','" .$user["class"]. "','" .$user["role"]. "','" .$user["avatar"]. "','" .$user["year"]. "-" .$user["month"]. "-" .$user["day"]. "','" .$user["gender"]. "')";

			
        	$results = mysqli_query( Database::$dbc, $query );

        	if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return TRUE;
        	}
		}
		public function list_user(){

			$query = "SELECT * FROM users ORDER BY id DESC";
			$results = mysqli_query( Database::$dbc, $query );

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
				else return $row=0;

			}

		}
		
		public function delete_iduser_ingroup($id){
			$query = "DELETE FROM user_group WHERE user_id = '{$id}' ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				return TRUE;

			}
		}
		public function delete_user($id){
			$query = "DELETE FROM users WHERE id = '{$id}' ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				return TRUE;

			}
		}

		public function find_user($id){
			$query = "SELECT * FROM users WHERE id = $id";
			$results = mysqli_query( Database::$dbc, $query );
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				$data = mysqli_fetch_array($results,MYSQLI_ASSOC);
				return $data;

			}
		}

		public function edit_user($edit){
			$query = "UPDATE users SET fullname= '{$edit['fullname']}',username= '{$edit['username']}',password= '{$edit['password']}',phone= '{$edit['phone']}',avatar= '{$edit['avatar']}' WHERE id = {$edit['id']} ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return TRUE;
        	}
		}


		public function list_limit($table,$start,$limit){

			$query = "SELECT * FROM $table ORDER BY id DESC LIMIT $start, $limit";
			$results = mysqli_query( Database::$dbc, $query );
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

		public function list_news(){
			$query = "SELECT * FROM news ORDER BY id DESC";
			$results = mysqli_query( Database::$dbc, $query );
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
				else $rows=0;
			

			}
		}
		public function delete_news($id){
			$query = "DELETE FROM news WHERE id = '{$id}' ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				return TRUE;

			}
		}

		public function find_news($id){
			$query = "SELECT * FROM news WHERE id = $id";
			$results = mysqli_query( Database::$dbc, $query );
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				$data = mysqli_fetch_array($results,MYSQLI_ASSOC);
				return $data;

			}
		}

		public function edit_news($edit){

			$query = "UPDATE news SET title= '{$edit['txtName']}',  content = '{$edit['txtContent']}', images = '{$edit['image']}'   WHERE id = {$edit['id']} ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return TRUE;
        	}
		}

		public function post_news($news){

			$query = "INSERT INTO news( id,title,content,createdate,images,author,tags) VALUES ( '', '{$news['txtName']}', '{$news['txtContent']}','{$news['date']}' , '{$news['image']}', '{$news['author']}', 1) ";
			$results = mysqli_query( Database::$dbc, $query );

			if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return TRUE;
        	}

		}

		public function search_all($table,$keysearch,$name){

			$query = "SELECT * FROM $table WHERE $name LIKE '%$keysearch%' ORDER BY id DESC";
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
		

		public function selectId($username){
			
			$query = "SELECT id FROM users WHERE username='$username'";
			$results= mysqli_query(Database::$dbc,$query);
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				$id = mysqli_fetch_array($results,MYSQLI_ASSOC);
				return $id;

			}
			
		}

		public function addGroup($user_id,$role){
			$query="INSERT INTO user_group(id,user_id,group_id)  
				VALUES('null', '$user_id','$role')";

        	$results = mysqli_query( Database::$dbc, $query );
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else 
			return TRUE;
		}

		public function search_group($user_id){
			$query = "SELECT * FROM user_group WHERE user_id = $user_id";
			$results = mysqli_query( Database::$dbc, $query );
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				while($datas = mysqli_fetch_array($results,MYSQLI_ASSOC))
				{
					$data[] =$datas;
					echo "hh";
					
				}
				return $data;
				//$data = mysqli_fetch_array($results,MYSQLI_ASSOC);
				

			}
		}
		// kiểm tra xem user đã tồn tại trong db chưa
		public function check_isset_user($username){
			$query = "SELECT * FROM users WHERE username = '{$username}' ";
			$results = mysqli_query( Database::$dbc, $query );
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				$data[]=NULL;
				while($datas = mysqli_fetch_array($results,MYSQLI_ASSOC))
				{
					$data[] =$datas;
				 }
				 print_r($data);
				$count= count($data);
				if($count>1 )
				{
					ECHO $count;
					return TRUE;
				}
				
				else
				return FALSE;
			}
		}
		
		

		public function textShort($text, $limit=80){
			$text = $text." ";
			$text = substr($text, 0, $limit);
			$text = substr($text, 0, strrpos($text, ' '));
			$text = $text.".....";
			return $text;
		}
		
		
		
	}
		
	
	?>
<?php



	
	class UserController extends UserModel{


		public function index(){

			if( !isset($_SESSION['user']) ){
				echo "bạn chưa đăng nhập";
				return;
			}
			else{
				require('app/views/user/index.php');
			}


		}

		public function sumPer($nhom){
            $sum = 0;
            $sql = "SELECT permission_id FROM group_permission WHERE group_id = $nhom";
			$results = mysqli_query( Database::$dbc, $sql );
            while($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
               $row["permission_id"].'</br>';
               $sum += pow(2,$row["permission_id"]-1);
            }
	        return $sum;
        }
        function checkUser($user_id){
            $sql = "SELECT group_id FROM user_group WHERE user_id = $user_id";
            $results = mysqli_query( Database::$dbc, $sql );
            while($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
                $group=$row['group_id'];
            }
            return $group;  
        }

		public function login(){
		}
	
		public function register(){

			
			if(isset($_SESSION['user'])){

				header('Location: .');

			}

			else{

					if(!empty($_POST)){

						//neu ton tai $_POST

						if( $_POST['username'] == NULL || $_POST['password'] == NULL ){

							require('views/user/register.php');

						}
						else{
							$user = array(
								


								'fullname'=>$_POST['fullname'],
								'username'=>$_POST['username'],
								'password'=>md5($_POST['password']),
								'email'=>$_POST['email'],
								'phone'=>$_POST['phone'],
								'class'=>$_POST['class'],
								'role'=>$_POST['role'],
							   
								'student_id'=>$_POST['student_id'],
								'avatar'=>$_FILES['avatar']['name'],
								'day'=>$_POST["day"],
								'month'=>$_POST["month"],
								'year'=>$_POST["year"],
								'gender'=>$_POST["gender"],
							);

							parent::save_user($user);

							$_SESSION['user'] = $user;

							echo "<script>alert('Đăng ký thành công')</script>";
							//require('');

						}


					
					}
					else{
						
						require('app/views/user/register.php');
	
					}

				
			}
			

		}

		public function logout(){

			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				echo "dang xuat thanh cong";
				header("Location:/kit_club");
			}
			else{
				header("Location:/kit_club");
			}

		}

		public function update_info() {
			if(isset($_SESSION['user']))
			{
				if(isset($_POST['updateUser'])){
					
					$edit= $_POST;
					// echo $edit['username'];
					// return;
					 $edit['avatar']=$_FILES['avatar']['name'];
					//return;
					//$member['avatar']=$_FILES['avatar']['name'];
					if( $edit['fullname'] == NULL || $edit['password'] == NULL){

						echo "<script>alert('Fail Edit Member')</script>";
						echo "<script type='text/javascript'>
								history.go(-1)
							</script>";

					}
					else{
						$user =$_SESSION['user'];

						$edit['id'] = $_SESSION['user']['id'];
						
							if($edit['password'] == NULL ){

								$edit['password'] = $user['password'];
							}
							else{
								$edit['password'] = md5($edit['password']);
							}
							//avatar null
							if($edit['avatar'] == NULL ){
								$edit['avatar'] =$user['avatar'];
							}
							
						$check = parent::user_update_info($edit);

						if($check == TRUE){
							if($edit['avatar'] != $user['avatar']){
								if(file_exists('public/img/'.$user['avatar'])){
									unlink('public/img/'.$user['avatar']);
								}
							}		


							$uploads_dir='public/img/';
							$name=$_FILES["avatar"]["name"];
							
							move_uploaded_file($_FILES["avatar"]["tmp_name"],$uploads_dir.$name);
							echo "<script>alert('Success Edit Member')</script>";
							//return;
							echo "<script type='text/javascript'>
								history.go(-1)
							</script>";
						}
						else{
							
							echo "<script>alert('Fail Edit Member')</script>";
							echo "<script type='text/javascript'>
								history.go(-1)
							</script>";
						}

						
					}
				}

			}
			else{
				echo "<script>alert('Fail Edit Member')</script>";
				echo "<script type='text/javascript'>
					           history.go(-1)
					      </script>";
			}

			
		}

		public function update_avatar() {
			if (isset($_SESSION['user'])) {
				if (isset($_POST['user_update_avatar'])) {
					if (isset($_FILES['avatar_input'])) {
						$file = $_FILES['avatar_input'];
						$mimeType = $file['type'];
						if ($mimeType != 'image/png' && $mimeType != 'image/jpeg' && $mimeType != 'image/gif') {
							echo 'Chỉ cho phép ảnh png, jpeg, gif';
							return true;
						}

						$target_dir = "public/images/user/";
						$file_name = $_SESSION['user']['username'].'.'.$this->getImageExtension($mimeType);
						move_uploaded_file($file['tmp_name'], $target_dir.$file_name);
						$data = [
							'file_name' => $file_name,
							'user_update_avatar' => true
						];
						parent::user_update_avatar($data);
						header("Location: /user");
					}
				}
			} else {
				header('Location: /');
			}
		}
		public function getImageExtension($str) {
			$s = explode('/', $str);
			return $s[1];
		}
	}


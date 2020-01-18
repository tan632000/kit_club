<?php
	/**
	 * @package		Website clb_kit
	 * @author 		Teamweb
	 * @copyright 	Copyright (c) 10/2019
	 * @since 		Version 1.0
	 * @filesource 	admin/controllers/member.php
	 */
	require('admin/models/member.php');
	require('admin/models/paginate.php');
	class MemberController extends MemberModel{
		// thêm thành viên
		public function home(){
			if( isset($_SESSION['user']) && $_SESSION['sumPer']==4095)
			require('admin/views/member/home.php');
			else{
				echo "<script>alert('Fail Add Member => Bạn ko đủ quyền')</script>";
				echo "<script type='text/javascript'>
					           window.location = '/kit_club/admin.php'
					      </script>";
			}
		}

		public function add(){
			if(isset($_SESSION['user']) && $_SESSION['sumPer']==4095 )
			{
				require_once('app/models/checkPassword.php');
				require('admin/views/member/add.php');
				
				if(isset($_POST['add'] ) && isset($_SESSION['user']) && $_SESSION['sumPer']==4095){
					
					$member = $_POST;
					
					$userIsset= parent::admin_checkIsset_user($member['username']);
					if($userIsset==TRUE)
					{
						echo "<script>alert('User đã tồn tại!')</script>";
						return;
					}
					
					// lấy vai trò
					$role= $member['role'];
					// hết lấy vai trò
					$member['password']=md5($_POST['password']);
					$member['avatar']=$_FILES['avatar']['name'];
					if( $member['username'] == NULL || $member['password'] == NULL ){

						echo "<script>alert('Fail Add Member')</script>";
						echo "<script type='text/javascript'>
								history.go(-1)
							</script>";

					}
					else{
						$checkPassWord = checkPass($_POST['password']);
						if($checkPassWord){
							echo "<script>alert('Mật khẩu không hợp lệ')</script>";
							return;
						}
						$check = parent::admin_add_user($member);

						if($check == TRUE){

							$uploads_dir='public/img/';
							$name=$_FILES["avatar"]["name"];
							
							move_uploaded_file($_FILES["avatar"]["tmp_name"],$uploads_dir.$name);
							// lấy id người dùng vừa thêm
							
							$id_user = parent::admin_selectId_user($member['username']);
							$id_user =$id_user['id'];
							
							$check1 = parent::admin_add_group($id_user,$role);
							if($check1 == TRUE){
							echo "<script>alert('Success Add Member')</script>";
							}
							echo "<script type='text/javascript'>
								window.location = '/kit_club/admin.php?url=member/listAll'
							</script>";
							
						}
						else{
							echo "<script>alert('Fail Add Member')</script>";
							echo "<script type='text/javascript'>
								history.go(-1)
							</script>";
						}

					}
					

				}
				
			}
			else{
					echo "<script>alert('Fail Add Member => Bạn ko đủ quyền')</script>";
					echo "<script type='text/javascript'>
								window.location = '/kit_club/admin.php'
							</script>";
				}

		}
		// danh sách thành viên
		public function listAll(){
		if(isset($_SESSION['user']) && $_SESSION['sumPer']==4095 ){
			$rows = parent::admin_list_user();
			if($rows==0)
			{
				echo "Chưa có dữ liệu bảng trong của members!";
				return;
			}
			$count = count($rows);
			//Phần trang
			$paginate = new PaginateModel;
			$limit = 5;
			$start = $paginate->findStart($limit);
		
			$sumpage=$paginate->findPages($count,$limit);
			$member = parent::admin_list_limit($start,$limit);
			if($member==0)
			{
				echo '<div class="col-md-10 content " >';
				echo '<img style="width:900px; padding: 50px 30px 50px 100px" src="/kit_club/public/commom/404.jpg" alt="cút cút cút_ ngu vl">';
				
				return;
			}
			require('admin/views/member/list.php');
		}
		else{
			echo "<script>alert('Fail Add Member => Bạn ko đủ quyền')</script>";
			echo "<script type='text/javascript'>
						   window.location = '/kit_club/admin.php'
					  </script>";
		}

		}
// xóa thành viên
		public function delete($id){
			if(isset($_SESSION['user']) && $_SESSION['sumPer']==4095 )
			{	
				$check_deleteId_in_group= parent::admin_delete_iduser_ingroup($id);
				if($check_deleteId_in_group==TRUE)
				{
					$check = parent::admin_delete_user($id);
					if($check == TRUE){
						echo "<script>alert('Success Delete Member')</script>";
						echo "<script type='text/javascript'>
									window.location = '/kit_club/admin.php?url=member/listAll'
								</script>";
					}
					else{
						echo "<script>alert('Fail Delete Member')</script>";
						echo "<script type='text/javascript'>
									window.location = 'member/listAll.html'
								</script>";
					}
				}
			}
			else{
				echo "<script>alert('Fail Add Member => Bạn ko đủ quyền')</script>";
				echo "<script type='text/javascript'>
							   window.location = '/kit_club/admin.php'
						  </script>";
			}
		}
// sửa thành viên
		public function edit($id){
			if(isset($_SESSION['user']) && $_SESSION['sumPer']==4095 )
			{
				$user = parent::admin_find_user($id);
				require('admin/views/member/edit.php');
			}

		}
		public function postEdit($id){
			if(isset($_SESSION['user']) && $_SESSION['sumPer']==4095 )
			{
				if(isset($_POST['post_edit'])){
					
					$edit = $_POST;
					$edit['avatar']=$_FILES['avatar']['name'];
					//$member['avatar']=$_FILES['avatar']['name'];
					if( $edit['fullname'] == NULL || $edit['password'] == NULL){

						echo "<script>alert('Fail Edit Member')</script>";
						echo "<script type='text/javascript'>
								history.go(-1)
							</script>";

					}
					else{
						$user = parent::admin_find_user($id);

						$edit['id'] = $id;
						//pass null

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
							
						$check = parent::admin_edit_user($edit);

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
							
							echo "<script type='text/javascript'>
								window.location = '/kit_club/admin.php?url=member/listAll'
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
// tìm kiếm thành viên
		public function search($keysearch){
			$rows = parent::admin_search_member($keysearch);
			if($rows==null)
			{
				echo'<h1 align="center">không tìm thấy kết quả phù hợp!</h1>';
				
				return 0;
			}

			require('admin/views/member/search.php');
		}
// chỉnh nhóm thành viên
	public function editPer($id){
		// $rows = parent::admin_search_member($keysearch);
		// if($rows==null)
		// {
		// 	echo'<h1 align="center">không tìm thấy kết quả phù hợp!</h1>';
			
		// 	return 0;
		// }

		require('admin/views/member/editPer.php');
	}

	public function editGr($id){
		if(isset($_POST['submit'])   ){
			$group = $_POST;
		
		//$check1 = parent::admin_add_group($user['id'],$role);
		print_r($group);
		return;
		echo "hhivvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv";
	}
	$user = parent::admin_find_user($id);
	$searchGr= parent::admin_find_Gr($user['id']);
	foreach($searchGr as $row) {
		
		$grs=$row['group_id'];
		$gr[]=$grs;
		}
		
	
	
	// echo '<div class="col-md-10 content" >';
	// print_r($searchGr[0]['group_id']);
	// return;
	require('admin/views/member/editGr.php');
	}
}
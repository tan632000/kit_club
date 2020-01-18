<?php

	
	class MemberModel extends MasterModel{
		
		public function admin_add_user($member){

			return parent::add_user($member);

		}
		public function admin_selectId_user($Idmember){

			return parent::selectId($Idmember);

		}
		public function admin_add_group($id_user,$role){

			return parent::addGroup($id_user,$role);

		}
		

		public function admin_list_user(){
			return parent::list_user();
		}
		public function admin_list_limit($start,$limit){
			return parent::list_limit('users',$start,$limit);
		}
		public function admin_delete_iduser_ingroup($id){
			return parent::delete_iduser_ingroup($id);
		}
		
		public function admin_delete_user($id){
			return parent::delete_user($id);
		}

		public function admin_find_user($id){
			return parent::find_user($id);
		}

		public function admin_edit_user($edit){
			return parent::edit_user($edit);
		}

		public function admin_search_member($keysearch){

			return parent::search_all('users',$keysearch,'fullname');
		}
		public function admin_search_member_limit($keysearch,$start,$limit){
			return parent::search_limit('users',$keysearch,$start,$limit);
		}
		public function admin_find_Gr($user_id){
			return parent::search_group($user_id);
		}
		public function admin_checkIsset_user($username){
			return parent::check_isset_user($username);
		}
		
	}
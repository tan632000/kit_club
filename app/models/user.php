<?php
	/**
	 * @package		web_clbkit
	 * @author 		Team_web
	 * @copyright 	Copyright (c) 10/2019
 	 * @filesource 		models/user.php
	 */
	include('MasterModel.php');
	class UserModel extends MasterModel{
		
		public function save_user($user){

			return parent::add_user($user);

		}

		public function check_login($user){

			return parent::check_user($user);

		}

		public function user_order($user){
			return parent::all_user_order($user);
		}

		public function user_update_info($data) {
			return parent::user_update($data);
		}

		public function user_update_avatar($data) {
			return parent::user_update($data);
		}
		
	}

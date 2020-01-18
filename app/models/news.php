<?php
	/**
	 * @package		web_clbkit
	 * @author 		Team_web
	 * @copyright 	Copyright (c) 10/2019
 	 * @filesource 		models/user.php
	 */

	class NewsModel extends MasterModel{
		
		public function getnew($id){

			return parent::get_new_by_id($id);

		}

	
		
	}

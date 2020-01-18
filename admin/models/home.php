<?php

	
	class HomeModel extends MasterModel{
		public function admin_list_user(){
			return parent::list_user();
		}
	
	
		public function admin_list_news(){
			return parent::list_news();
		}
	
		
		
	}
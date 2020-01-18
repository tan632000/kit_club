<?php
	
	
	class NewsModel extends MasterModel{

		public function admin_post_news($news){
			return parent::post_news($news);
		}
		public function admin_list_news(){
			return parent::list_news();
		}
		public function admin_list_limit($start,$limit){
			return parent::list_limit('news',$start,$limit);
		}

		public function admin_delete_news($id){
			return parent::delete_news($id);
		}

		public function admin_find_news($id){

			return parent::find_news($id);
		}
		public function admin_edit_news($edit){

			return parent::edit_news($edit);
		}

		public function admin_search_news($keysearch){

			return parent::search_all('news',$keysearch,'title');
		}
		public function admin_search_news_limit($keysearch,$start,$limit){
			return parent::search_limit('news',$keysearch,$start,$limit);
		}

	}
<?php
	
	require('admin/models/home.php');
	class HomeController extends HomeModel{
		public function index(){
			$users = parent::admin_list_user();
			$news = parent::admin_list_news();
			require('admin/views/home/index.php');

		}

	}
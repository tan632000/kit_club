<?php
	require('app/models/home.php');
	
	class HomeController extends HomeModel{
	
		public function index($page=0){
			if($page!=0)
			$start=($page-1)*12;
			$homeNewNews = parent::get_all_news_new($start,12);
			// foreach($homeNewNews as $row =>$key)
			// {
			// 	echo $key['id'];
			// }
			// return ;
			
			require('app/views/home/index.php');

		}

	}
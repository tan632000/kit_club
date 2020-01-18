<?php
	require('app/models/news.php');
	
	class NewsController extends NewsModel{
	
		public function detail($id){
			$homeDetailNews = parent::getnew($id);
			require('app/views/home/pages/details.php');

		}

	}
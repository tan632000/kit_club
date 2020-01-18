<?php

	class HomeModel extends MasterModel{
		public function format($text)
		{
			return parent::textShort($text,$limit=50);
		}
		public static function get_all_news_new($start=0,$end=4){
			
			return parent::get_all_from('news',array('offset'=>$start,'limit'=>$end,'order'=>'DESC'));
		}
	}
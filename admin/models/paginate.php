<?php

	
	class PaginateModel extends MasterModel {

		public $limit;
		// public $baseUrl = $_SERVER['PHP_SELF'];

		//Tìm trang hiện tại
		public static function findStart($limit){

			//Nếu không tồn tại $_GET['page'] trên đường dẫn hoặc nó =1 thì đây là trang đầu tiên
			$url = isset($_GET['url'])? $_GET['url'] :NULL;	
			if($url!=NULL)
			{
			$url = rtrim($url,'/');
			$url = explode("/", $url);
			$method=isset($url[1]) ? $url[1] : null;
			$param=isset($url[2]) ? $url[2] : "1";
				
			}

			
			return $start=($param-1)*$limit;

		}

		//Lấy tổng số trang
		public static function findPages($count, $limit){

			//Nếu tổng record chia hết cho số kq/1 trang thì chia. còn không thì. +1
			//
			$pages = (($count % $limit) == 0) ? ($count/$limit) : (($count/$limit)+1);
			return $pages;

		}


		//Hiển thị ra list paginate. Biến đầu tiên là lấy page hiện tại. biến thứ 2 là tổng số trang return từ hàm trên
		//
		public static function getList($curPage, $pages){

			
			$page_list = "";//Lưu trang . điều hướng đầu, cuối trang

			//Tách lấy đường dẫn gốc của trang
			$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
			
			
			if( isset($_SESSION['searchAdmin']) ){
				$currentUrl = $uri_parts[0].'?s='.$_SESSION['searchAdmin'];
			}
			else{
				$currentUrl = $uri_parts[0];

			}


			//In danh sách
			for($i=1; $i<=$pages ;$i++){

				if($i == $curPage){
					$page_list .= "<li class='active'><span>".$i."</span></li>";// Nếu là trang hiện tại thì bỏ đường link, in đậm và chỉ hiện thị con số của trang
				}
				else{
					$page_list .= '<li><a href="'.$currentUrl.'?page='.$i.'" title="Trang '.$i.'">'.$i.'</a></li>';
				}
				$page_list .='';

			}
			return $page_list;

		}
	}
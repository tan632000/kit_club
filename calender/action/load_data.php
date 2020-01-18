<?php 
	session_start();
	require "../curl/get_data_login.php";
	require_once "../curl/lib_curl.php";
	require "../models/database_action.php";
	$get=new get();
	$data = new Database();
	$user=isset($_POST['username']) ? $_POST['username'] : "" ;
	$pass=md5(isset($_POST['password']) ? $_POST['password'] : "");
	$check_login = isset($_POST['check']) ? $_POST['check'] : "";
	header('Content-Type: application/json; charset=utf-8');
	$result=$get->post_data("http://qldt.actvn.edu.vn/CMCSoft.IU.Web.Info/Login.aspx");	
	$patternGetName = '/<span id="PageHeader1_lblUserFullName" style="color:Blue;font-size:10px;font-weight:bold;">(.*?)\(.*\)<\/span>/';
	$nameStudent = '';
	
	if(!preg_match('/Thông tin cá nhân/', $result)) {	
		die('0');
	}
	else{
		if(preg_match_all($patternGetName, $result, $name)){
			$nameStudent = $name[1][0];
		
		}
		if($check_login == '1'){
			$result = $data->get_data_kit($_POST['id']);
			if($result['student_text'] != ''){
				die('1');	
			}
		}
		else{
			$result = $data->get_data_tkb($user);
			if($result){
				$x = $user.",".rand(10,100);
				$x = str_rot13(base64_encode(str_rot13($x)));
				setcookie('user' , $x , time()+ 60*60*24*30);
				die('1');	
			}
		}
	}
	

	$response=$get->get_data_tkb("http://qldt.actvn.edu.vn/CMCSoft.IU.Web.Info/Reports/Form/StudentTimeTable.aspx");
	$pattern ='/<tr class=".*" style="height:20px;">\s*<td align="center">\d{1,2}<\/td><td style="font-weight:bold;">\s*(.*?)\s*<\/td><td>\s*<span id=".*">(.*?)<\/span>\s*<\/td><td>\s*(.*?)\s*<\/td><td>\s*(.*?)\s*<\/td><td>\s*(.*?)\s*<\/td><td align="center">\s*(.*?)\s*<\/td><td align="center">\s*(.*?)\s*<\/td><td align="center">\s*(.*?)\s*<\/td><td align="right">\s*(.*?)\s*<\/td><td align="right">\s*(.*?)\s*<\/td>\s*<\/tr>/';
	$pattern_get_change_class='/\((.*?)\)/';
	$pattern_get_weekend_adress='/\>(\[T(.)\])? (.*?)\</';
	$arr_weekend_vn=array("2","3","4","5","6");
	$arr_weekend_en=array("Monday","Tuesday", "Wednesday", "Thursday", "Friday");
	$arr_result = array();
	$arr_raw_data = array();

	function get_subject_change_class($arr_raw_data , $count_subject){
		$arr_raw_data[$count_subject][3]= substr($arr_raw_data[$count_subject][3], 3);	
		$arr_raw_data[$count_subject][3]=$arr_raw_data[$count_subject][3]."<br>";
		$arr_subject_change_class[$count_subject]=explode('<b>',$arr_raw_data[$count_subject][3]);
		return $arr_subject_change_class[$count_subject];
	}

	function change_weekend(  $arr_time ,$count_subject , $count_change_time){
		$arr_time[$count_subject][$count_change_time][0]=strtotime(str_replace("/", "-", $arr_time[$count_subject][$count_change_time][0]));
		$arr_time[$count_subject][$count_change_time][1]=strtotime(str_replace("/", "-", $arr_time[$count_subject][$count_change_time][1]));

		return $arr_time[$count_subject][$count_change_time] ; 
	}


	function join_data($arr_raw_data , $arr_time ,$arr_adress , $count_subject , $count_change_time , $count_change_class_fake , $check){
		$date=0;		
		for($time=$arr_time[$count_subject][$count_change_time][0];$time<=$arr_time[$count_subject][$count_change_time][1];$time=$time+60*60*24){
			$getdate=getdate($time);
			for($f=2;$f<count($arr_time[$count_subject][$count_change_time]);$f++){
				if($getdate['weekday']===$arr_time[$count_subject][$count_change_time][$f][0]){
					$arr_result[$count_subject][$count_change_time][$date][0]=$getdate['mday'].'-'.$getdate['mon'].'-'.$getdate['year'];;
					$arr_result[$count_subject][$count_change_time][$date][]=$arr_time[$count_subject][$count_change_time][$f][1];
					$arr_result[$count_subject][$count_change_time][$date][]=$arr_raw_data[$count_subject][0];
					$arr_result[$count_subject][$count_change_time][$date][]=$arr_raw_data[$count_subject][4];
					if($check == 1){
						if($getdate['weekday']===$arr_adress[$count_subject][$count_change_class_fake][1][0]){
						$arr_result[$count_subject][$count_change_time][$date][]=$arr_adress[$count_subject][$count_change_class_fake][1][1];
						}
						else if($getdate['weekday']===$arr_adress[$count_subject][$count_change_class_fake][2][0]){
							$arr_result[$count_subject][$count_change_time][$date][]=$arr_adress[$count_subject][$count_change_class_fake][2][1];
						}
					}
					else if($check == 2){
						$arr_result[$count_subject][$count_change_time][$date][]=$arr_adress[$count_subject][$count_change_class_fake][1];
					}
					else if($check == 3){
						$arr_result[$count_subject][$count_change_time][$date][]=$arr_raw_data[$count_subject][3];
					}
					
					$date++;
				}
			}
		}
		return $arr_result[$count_subject][$count_change_time];
	}

	function get_adress($arr_subject_change_class , $count_subject , $count_change_class , $pattern_get_change_class , $pattern_get_weekend_adress , $arr_weekend_vn , $arr_weekend_en  ){

		if(strpos($arr_subject_change_class[$count_subject][$count_change_class], '[')){
			if(preg_match($pattern_get_change_class, $arr_subject_change_class[$count_subject][$count_change_class], $matches_0)){
				if(preg_match_all($pattern_get_weekend_adress, $arr_subject_change_class[$count_subject][$count_change_class], $matches_1)){	
					$arr_temp_0[0]=$matches_0[1];
					$matches_1[2][0]=str_replace($arr_weekend_vn[$matches_1[2][0]-2], $arr_weekend_en[$matches_1[2][0]-2], $matches_1[2][0]);
					$arr_temp_0[1][0]=$matches_1[2][0];
					$arr_temp_0[1][1]=$matches_1[3][0];
					$matches_1[2][1]=str_replace($arr_weekend_vn[$matches_1[2][1]-2], $arr_weekend_en[$matches_1[2][1]-2], $matches_1[2][1]);
					$arr_temp_0[2][0]=$matches_1[2][1];
					$arr_temp_0[2][1]=$matches_1[3][1];
					$arr_adress[$count_subject][$count_change_class]=$arr_temp_0;
				}
			}
		}
		else{
			if(preg_match($pattern_get_change_class, $arr_subject_change_class[$count_subject][$count_change_class], $matches_0)){
				if(preg_match_all($pattern_get_weekend_adress, $arr_subject_change_class[$count_subject][$count_change_class], $matches_1)){		
					$arr_temp_1[0]=$matches_0[1];
					$arr_temp_1[1]=$matches_1[3][0];
					$arr_adress[$count_subject][$count_change_class]=$arr_temp_1;
				}
			}
		}
		return $arr_adress[$count_subject][$count_change_class];
	}


	if(preg_match_all($pattern, $response, $matches)){
		$number_of_subjects=count($matches[1]);
		// đưa thông tin từng môn vào 1 mảng
		for($count_subject=0 ; $count_subject<$number_of_subjects ; $count_subject++){
			for($count_change_time=1 ; $count_change_time<=5 ; $count_change_time++){
				$arr_raw_data[$count_subject][$count_change_time-1]=$matches[$count_change_time][$count_subject];
			}
		}
		for($count_subject=0;$count_subject<$number_of_subjects;$count_subject++){
			if(strpos($arr_raw_data[$count_subject][3], 'br')){
				$arr_subject_change_class[$count_subject]= get_subject_change_class($arr_raw_data , $count_subject);

				$num_of_change_class=count($arr_subject_change_class[$count_subject]);
				for($count_change_class=0  ;$count_change_class < $num_of_change_class ; $count_change_class++){
					$arr_adress[$count_subject][$count_change_class] = get_adress($arr_subject_change_class , $count_subject , $count_change_class , $pattern_get_change_class , $pattern_get_weekend_adress , $arr_weekend_vn , $arr_weekend_en  );
				}
			
			}
			else{
				$arr_adress[]=$arr_raw_data[$count_subject][3];
			}
		}
		$pattern_all='/Từ (.*?) đến (.*?):.{0,11}((<br>&nbsp;&nbsp;&nbsp;<b>Thứ (.) tiết (.*?) \(.{2}\)<\/b>){1,3})/';
		$arr_time=array();
		for($count_subject=0;$count_subject<$number_of_subjects;$count_subject++){
			if(preg_match_all($pattern_all, $arr_raw_data[$count_subject][2], $matches_all)){
				$num_of_change_time=count($matches_all[1]);
				for($count_change_time=0 ; $count_change_time<$num_of_change_time ; $count_change_time++){	
					
					for($count=1 ; $count<=2 ; $count++){
						$arr_time[$count_subject][$count_change_time][$count-1]=$matches_all[$count][$count_change_time];
					}
					$pattern='/&nbsp;&nbsp;&nbsp;<b>Thứ (.*?) tiết (.*?) \(.{2}\)/';
					if(preg_match_all($pattern, $matches_all[3][$count_change_time], $matches)){	
					 	$num_of_lesson=count($matches[0]);
					 	for($count_lesson=0;$count_lesson<$num_of_lesson;$count_lesson++){
					 		for($count=1;$count<=2;$count++){
								$arr_time[$count_subject][$count_change_time][$count_lesson+2][$count-1]=$matches[$count][$count_lesson];
								if($count==1){
									$arr_time[$count_subject][$count_change_time][$count_lesson+2][$count-1]=str_replace($arr_weekend_vn[$arr_time[$count_subject][$count_change_time][$count_lesson+2][$count-1]-2],$arr_weekend_en[$arr_time[$count_subject][$count_change_time][$count_lesson+2][$count-1]-2] ,$arr_time[$count_subject][$count_change_time][$count_lesson+2][$count-1]);
								}
							}
						}
					}
					if(strpos($arr_raw_data[$count_subject][3], 'br')){	
						$num_of_change_class=count($arr_subject_change_class[$count_subject]);
						for($count_change_class_fake=0;$count_change_class_fake<$num_of_change_class;$count_change_class_fake++){
							$arr_adress[$count_subject][$count_change_class_fake][0]='a'.$arr_adress[$count_subject][$count_change_class_fake][0];
							$tam=$count_change_time+1;
							if(strpos($arr_adress[$count_subject][$count_change_class_fake][0],(string)($tam))){
								
								if(strpos($arr_subject_change_class[$count_subject][$count_change_class_fake], '[')){
									$arr_time[$count_subject][$count_change_time] = change_weekend($arr_time ,$count_subject , $count_change_time);
									$arr_result[$count_subject][$count_change_time] = join_data($arr_raw_data , $arr_time ,$arr_adress , $count_subject , $count_change_time , $count_change_class_fake , 1);
								}
								else{		
									$arr_time[$count_subject][$count_change_time] = change_weekend($arr_time ,$count_subject , $count_change_time);
									$arr_result[$count_subject][$count_change_time] = join_data($arr_raw_data , $arr_time ,$arr_adress , $count_subject , $count_change_time , $count_change_class_fake , 2);
								}
							}
						}
					}
					else{
						$arr_subject_change_class[]=$arr_raw_data[$count_subject][3];
						$arr_time[$count_subject][$count_change_time] = change_weekend($arr_time ,$count_subject , $count_change_time);
						$arr_result[$count_subject][$count_change_time] = join_data($arr_raw_data , $arr_time ,$arr_adress , $count_subject , $count_change_time , 0 , 3);
					}	
				}			
			}			
		}
	}
	
	for($count_subject=0;$count_subject<$number_of_subjects;$count_subject++){
		$num_of_change_time=count($arr_result[$count_subject]);
		for($count_change_time=0;$count_change_time<$num_of_change_time;$count_change_time++){
			$num_of_date_study=count($arr_result[$count_subject][$count_change_time]);
			for($count=0;$count<$num_of_date_study;$count++){
				$arr_result_data[]=array(
					"date" =>  strtotime($arr_result[$count_subject][$count_change_time][$count][0]),
					"lesson" => $arr_result[$count_subject][$count_change_time][$count][1],
					"name" => $arr_result[$count_subject][$count_change_time][$count][2],
					"teacher" => $arr_result[$count_subject][$count_change_time][$count][3],
					"adress" => $arr_result[$count_subject][$count_change_time][$count][4]
				);
			}
		}
	}
	
	$num_of_date_study=count($arr_result_data);	
	$arr_string_of_date = array();
	
	
	for($count_subject=0;$count_subject<$num_of_date_study;$count_subject++){
		if(in_array($arr_result_data[$count_subject]['date'] , $arr_string_of_date)==false){
			$count=0;
			$arr_string_of_date[] = $arr_result_data[$count_subject]['date'];	
			for($count_change_time=0;$count_change_time<$num_of_date_study;$count_change_time++){
				if($arr_result_data[$count_change_time]['date']==$arr_result_data[$count_subject]['date']){
					$arr_result_data_end[$arr_result_data[$count_subject]['date']][$count]['lesson']=$arr_result_data[$count_change_time]['lesson'];
					$arr_result_data_end[$arr_result_data[$count_subject]['date']][$count]['name']=$arr_result_data[$count_change_time]['name'];
					$arr_result_data_end[$arr_result_data[$count_subject]['date']][$count]['teacher']=$arr_result_data[$count_change_time]['teacher'];
					$arr_result_data_end[$arr_result_data[$count_subject]['date']][$count]['adress']=$arr_result_data[$count_change_time]['adress'];
					$count++;
				}
			}
		}
	}
	
	ksort($arr_result_data_end);
	$arr_result_data_end = array('data' => $arr_result_data_end);
	$text = json_encode($arr_result_data_end, JSON_UNESCAPED_UNICODE);
	
	if($check_login == '1'){
		$_SESSION['user']['student_text'] = $text;
		$data->update($_POST['id'] , $user ,$nameStudent,  $pass , $text);
		die('1');
	}
	$result = $data->get_data_tkb($user);
	if(!$result){
		$data->create($nameStudent , $user , $pass , $text);
	}
	
	$x = $user.",".rand(10,100);
	$x = str_rot13(base64_encode(str_rot13($x)));
	setcookie('user' , $x , time()+ 60*60*24*30);
	die('1');
	
 ?>


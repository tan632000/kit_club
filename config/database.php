<?php
	/**
	 * @package		Website clb_kit
	 * @author 		Teamweb
	 * @copyright 	Copyright (c) 10/2019
	 * @since 		Version 1.0
	 * @filesource 	config/database.php
	 */
class Database{

	//Cấu hình database
	public static $dbc;
	private static $db_host = 'localhost';
	private static $db_user = 'root';
	private static $db_password = '';
	private static $db_name = 'web_kit';
	private static $collation = 'utf8';

	//Kết nối database
	public static function connect(){
		//Kết nối database
		self::$dbc=mysqli_connect( self::$db_host, self::$db_user , self::$db_password , self::$db_name );

		// Kiểm tra kết nối có thành công không
		if(!self::$dbc){
			echo 'Không thể kết nối Database';
		}
		else{
			mysqli_set_charset( self::$dbc, self::$collation );
			date_default_timezone_set('Asia/Ho_Chi_Minh');

		}
	}
}
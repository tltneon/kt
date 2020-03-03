<?php
	class DB {
		private static $host = "localhost";
		private static $user = "root";
		private static $pass = "";
		private static $db = "tracker";
		private static function connect(){
			$database = mysqli_connect(DB::$host, DB::$user, DB::$pass);
			mysqli_select_db($database, DB::$db);
			if(mysqli_errno($database)) return false;
			else return $database;
		}
		public static function query($query){
			$link = DB::connect();
			if(!$link) return false;
			$result = mysqli_query($link, $query);
			mysqli_close($link);
			return $result;
		}
		
	}
	class task{
		function make(){}
		function remove(){}
		function changeStatus(){}
		function changeUser(){}
		function edit(){}
		function getList(){}
	}
	class user{
		function add(){}
		function getList(){}
	}
?>
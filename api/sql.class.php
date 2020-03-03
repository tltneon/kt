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
	class task {
		public static function add($keys, $values){
			return DB::query("INSERT INTO `tasks`(".$keys.") VALUES (".$values.");");
		}
		public static function remove($id){
			return DB::query("DELETE FROM tasks WHERE id = ".$id.";");
		}
		public static function changeStatus($taskid, $status){
			return DB::query("UPDATE `tasks` SET `status`='".$userid."' WHERE `id`=".$taskid.";");
		}
		public static function changeAssignee($taskid, $userid){
			return DB::query("UPDATE `tasks` SET `assignee`=".$userid." WHERE `id`=".$taskid.";");
		}
		public static function edit($taskid, $name){
			return DB::query("UPDATE `tasks` SET `name`='".$name."' WHERE `id`=".$taskid.";");
		}
		public static function getList(){
			$result = DB::query("SELECT * FROM tasks;");
			return mysqli_fetch_all($result);
		}
	}
	class user {
		public static function add($keys, $values){
			return DB::query("INSERT INTO `users`(".$keys.") VALUES (".$values.");");
		}
		public static function getList(){
			$result = DB::query("SELECT * FROM users;");
			return mysqli_fetch_all($result);
		}
	}
?>
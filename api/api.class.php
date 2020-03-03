<?php
	require("sql.class.php");
	
	$data = isset($_POST["data"]) ? json_decode($_POST["data"], true) : null;
	
	print_r($_POST["data"]);
	print_r($data);
	
	if(!$data) die("{'status': 0, 'message': 'Wrong data received'}");
	
	//check authorize
	//checkin valid data
	switch($data["action"]){
		case "taskadd":
			$result = DB::query("SELECT * FROM tasks;");
		break;
		case "taskremove": 
			$entry = int($data["entry"]);
			$result = DB::query("DELETE FROM tasks WHERE id = ".$entry.";");
		break;
		case "taskedit":

		break;
		case "userlist":
			$result = DB::query("SELECT * FROM users;");
		break;
		case "useradd":
			$result = DB::query("SELECT * FROM users;");
		break;
		case "useredit":
		
		break;
		default: die("{'status': 0, 'message': 'Wrong action received'}"); break;
		
	}
			print_r($result);
			print_r(mysqli_fetch_array($result));
	
	$json = array(
		"status" => 1,
		"result" => mysqli_fetch_array($result)
	);
	echo 'JSON:' . json_encode($json, true);
?>
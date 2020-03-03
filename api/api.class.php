<?php
	require("sql.class.php");
	require("util.class.php");
	
	$data = isset($_POST["data"]) ? json_decode($_POST["data"], true) : null;
	
	print_r($_POST["data"]);
	
	if(!$data) throwError('Wrong data received');
	
	//check authorize
	//checkin valid data
	switch($data["action"]){
		case "taskadd":
			$sql = jsonToSql($data["data"]);
			print_r("INSERT INTO `tasks`(".$sql["keys"].") VALUES (".$sql["values"].");");
			$result = task::add($sql["keys"], $sql["values"]);
		break;
		case "taskremove": 
			if(!$data["data"]["id"]) throwError('Wrong id received');
			$id = (int) $data["data"]["id"];
			$result = DB::query("DELETE FROM tasks WHERE id = ".$id.";");
		break;
		case "taskedit":
			if(!$data["data"]["id"]) throwError('Wrong id received');
			$id = (int) $data["data"]["id"];

		break;
		case "tasklist":
			$result = task::getList();
		break;
		case "userlist":
			$result = user::getList();
		break;
		case "useradd":
			$sql = jsonToSql($data["data"]);
			print_r("INSERT INTO `users`(".$sql["keys"].") VALUES (".$sql["values"].");");
			$result = user::add($sql["keys"], $sql["values"]);
		break;
		default: die("{'status': 0, 'message': 'Wrong action received'}"); break;
	}
	
	$json = array(
		"status" => 1,
		"result" => $result
	);
	echo '<br />Result JSON:' . json_encode($json, true);
?>
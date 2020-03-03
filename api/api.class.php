<?php
	require("sql.class.php");
	require("util.class.php");
	
	$data = isset($_POST["__action"]) ? $_POST["__action"] : null;
	
	if(!$data) throwError('No action received');
	
	//check authorize somewhere
	
	switch($data["__action"]){
		case "taskadd":
			$sql = jsonToSql($data["data"]);
			//print_r("INSERT INTO `tasks`(".$sql["keys"].") VALUES (".$sql["values"].");");
			$result = task::add($sql["keys"], $sql["values"]);
		break;
		case "taskremove": 
			if(!$data["data"]["id"]) throwError('Wrong id received');
			$id = (int) $data["data"]["id"];
			$result = task::remove($id);
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
			//print_r("INSERT INTO `users`(".$sql["keys"].") VALUES (".$sql["values"].");");
			$result = user::add($sql["keys"], $sql["values"]);
		break;
		default: 
			throwError('Wrong action received');
		break;
	}
	
	$json = array(
		"status" => 1,
		"result" => $result
	);
	echo '<br />Result JSON:' . json_encode($json, true);
?>
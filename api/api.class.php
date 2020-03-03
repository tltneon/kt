<?php
	require("sql.class.php");
	require("util.class.php");
	
	$data = isset($_POST["__action"]) ? $_POST["__action"] : null;
	
	if(!$data) throwError('No action received');
	
	//check authorize somewhere
	
	switch($_POST["__action"]){
		case "taskadd":
			//$sql = jsonToSql($data["data"]);
			//print_r("INSERT INTO `tasks`(".$sql["keys"].") VALUES (".$sql["values"].");");
			if(!$_POST["name"]) throwError('Wrong name received');
			$result = task::add($_POST["name"]);
		break;
		case "taskremove": 
			if(!$_POST["id"]) throwError('Wrong id received');
			$id = (int) $_POST["id"];
			$result = task::remove($id);
		break;
		case "taskedit":
			if(!$_POST["id"] or !$_POST["name"]) throwError('Wrong data received');
			$id = (int) $_POST["id"];
			$result = task::edit($id, removeChars($_POST["name"]));
		break;
		case "taskstatus":
			if(!$_POST["id"] or !$_POST["status"]) throwError('Wrong data received');
			$id = (int) $_POST["id"];
			$result = task::changeStatus($id, removeChars($_POST["status"]));
		break;
		case "taskassignee":
			if(!$_POST["id"] or !$_POST["assignee"]) throwError('Wrong data received');
			$id = (int) $_POST["id"];
			$result = task::changeAssignee($id, (int) $_POST["assignee"]);
		break;
		case "tasklist":
			$result = task::getList();
		break;
		case "userlist":
			$result = user::getList();
		break;
		case "useradd":
			//print_r("INSERT INTO `users`(".$sql["keys"].") VALUES (".$sql["values"].");");
			if(!$_POST["name"]) throwError('Wrong name received');
			$result = user::add($_POST["name"]);
		break;
		default: 
			throwError('Wrong action received');
		break;
	}
	
	$json = array(
		"status" => 1,
		"result" => $result
	);
	echo json_encode($json, true);
?>
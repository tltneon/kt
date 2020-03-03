<?php	
	include("./api/sql.class.php");
	echo '<h5>task '.$_GET["id"].'</h5>';
	
	$task = task::get((int) $_GET["id"]);
	echo '<p>ID: '.$task["id"].'</p>';
	echo '<p>Name: '.$task["name"].'</p>';
	echo '<p>Assigned to user: #'.$task["assignee"].'</p>';
	echo '<p>Status: '.$task["status"].'</p>';
	
	echo '<a href="?page=taskedit&id='.$_GET["id"].'">taskedit '.$_GET["id"].'</a>';
?>
<?php
	include("./api/sql.class.php");
	
	if(isset($_GET["taskid"]) and $_GET["id"] and task::changeAssignee((int) $_GET["taskid"], (int) $_GET["id"])){
		echo '<h5>task '.$_GET["taskid"].' was assigned to user #'.$_GET["id"].'</h5>';
	}
	
	echo '<h5>assign task to userid '.$_GET["id"].'</h5>';
	
	$list = task::getList();
	
	echo '<table>';
	
	foreach($list as $item){
		echo '<tr>';
		foreach($item as $field){
			echo '<td>'.$field.'</td>';
		}
		echo '<td><a href="?page=assignto&id='.$_GET["id"].'&taskid='.$item[0].'">Select</a></td>';
		echo '</tr>';
	}
	
	echo '</table>';
?>
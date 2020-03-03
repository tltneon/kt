<?php
	include("./api/sql.class.php");
	
	echo '<h5>tasklist</h5>';
	echo '<a href="?page=taskadd'.(isset($_GET["mode"]) ? "&mode" : "").'">taskadd</a>';
	
	$list = task::getList();
	
	echo '<table>';
	
	foreach($list as $item){
		echo '<tr>';
		foreach($item as $field){
			echo '<td>'.$field.'</td>';
		}
		echo '<td><a href="?page=task&id='.$item[0].'">Task</a></td>';
		echo '</tr>';
	}
	
	echo '</table>';
	echo '<div>Total: '.count($list).'</div>'
?>
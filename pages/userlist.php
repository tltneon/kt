<?php
	include("./api/sql.class.php");
	echo '<h5>userlist</h5>';
	echo '<a href="?page=useradd'.(isset($_GET["mode"]) ? "&mode" : "").'">useradd</a>';
	
	$list = user::getList();
	
	echo '<table>';
	
	foreach($list as $item){
		echo '<tr>';
		foreach($item as $field){
			echo '<td>'.$field.'</td>';
		}
		echo '<td><a href="?page=assignto&id='.$item[0].'">Assign tasks to that user ></a></td>';
		echo '</tr>';
	}
	
	echo '</table>';
	echo '<div>Total: '.count($list).'</div>'
?>
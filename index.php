<div>
	<h5>Menu</h5>
	<a href="?page=task&entry=1">task 1</a>
	<a href="?page=taskadd">taskadd</a>
	<a href="?page=userlist" >userlist</a>
	<a href="?page=tasklist" >tasklist</a>
</div>

<?php
	$page = isset($_GET["page"]) ? $_GET["page"] : null;
	if(isset($page)){
		switch($page){
			case "tasklist": include("pages/tasklist.php"); break;
			case "userlist": include("pages/userlist.php"); break;
			case "taskadd": include("pages/taskadd.php"); break;
			case "taskedit": include("pages/taskedit.php"); break;
			case "task": 
				$entry = isset($_GET["entry"]) ? $_GET["entry"] : null;
				if(isset($entry)){
					include("pages/task.php");
				}
				break;
			default: break;
		}
	}
	else 
		echo 'Default page';
?>
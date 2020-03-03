<?php
	include("./api/sql.class.php");
	
	echo '<h5>taskedit</h5>';
	
	$task = task::get((int) $_GET["id"]);
?>
<form action="api.php" method="post">
	<input type="hidden" name="__action" value="taskedit" />
	<input type="hidden" name="id" value="<?php echo (int)$_GET["id"]; ?>" />
	<input name="name" value="<?php echo $task["name"]; ?>" />
	<input type="submit" value="Set task name" />
</form>
<form action="api.php" method="post">
	<input type="hidden" name="__action" value="taskstatus" />
	<input type="hidden" name="id" value="<?php echo (int)$_GET["id"]; ?>" />
	<input name="status" value="<?php echo $task["status"]; ?>" />
	<input type="submit" value="Set custom status" />
</form>
<form action="api.php" method="post">
	<input type="hidden" name="__action" value="taskremove" />
	<input type="hidden" name="id" value="<?php echo (int)$_GET["id"]; ?>" />
	<input type="submit" value="Delete task" />
</form>
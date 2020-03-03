<?php
	echo '<h5>taskedit</h5>';
	$json = array(
		"action" => "taskedit",
		"data" => array(
			"id" => "1",
			"name" => "1",
			"assignee" => "1",
			"status" => "old",
		)
	);
	$json = json_encode($json);
	$json2 = array(
		"action" => "taskremove",
		"data" => array(
			"id" => "1",
		)
	);
	$json2 = json_encode($json2);
?>
<form action="api.php" method="post">
	<textarea name="data"><?php echo $json; ?></textarea>
	<input type="submit" value="submit" />
</form>
<form action="api.php" method="post">
	<textarea name="data"><?php echo $json2; ?></textarea>
	<input type="submit" value="submit" />
</form>
<style>
	textarea {
		height: 250px;
		width: 550px;
	}
</style>
<?php
	echo '<h5>taskedit</h5>';
	$json = array(
		"__action" => "taskedit",
		"data" => array(
			"id" => "1",
			"name" => "1",
			"assignee" => "1",
			"status" => "old",
		)
	);
	$json = json_encode($json);
	$json2 = array(
		"__action" => "taskremove",
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
	<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
	<input type="submit" value="Delete task" />
</form>
<style>
	textarea {
		height: 250px;
		width: 550px;
	}
</style>
<?php
	echo '<h5>tasklist</h5>';
	$json = array(
		"action" => "taskadd",
		"data" => array(
			"name" => "123",
		)
	);
	$json = json_encode($json);
?>
<form action="api.php" method="post">
	<textarea name="data"><?php echo $json; ?></textarea>
	<input name="data2" value='{"action": "taskadd", "data": "<?php echo $json; ?>"}'/>
	<input type="submit" value="submit" />
</form>
<style>
	textarea {
		height: 250px;
		width: 550px;
	}
</style>
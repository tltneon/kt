<?php
	echo '<h5>tasklist</h5>';
	$json = array(
		"action" => "tasklist",
	);
	$json = json_encode($json);
?>
<form action="api.php" method="post">
	<textarea name="data"><?php echo $json; ?></textarea>
	<input type="submit" value="submit" />
</form>
<style>
	textarea {
		height: 250px;
		width: 550px;
	}
</style>
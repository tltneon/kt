<?php
	echo '<h5>taskadd</h5>';
	
	include("./api/sql.class.php");
	
	if(isset($_POST["name"])){
		task::add($_POST["name"]);
	}
?>
<form action="" method="post">
	<input name="name" value="" />
	<input type="submit" value="add" />
</form>
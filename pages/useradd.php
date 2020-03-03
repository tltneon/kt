<?php
	echo '<h5>useradd</h5>';
	
	include("./api/sql.class.php");
	
	if(isset($_POST["name"])){
		user::add($_POST["name"]);
	}
?>
<form action="" method="post">
	<input name="name" value="" />
	<input type="submit" value="add" />
</form>
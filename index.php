<div>
	<h5>Menu</h5>
	<a href="?page=userlist<?php echo (isset($_GET["mode"]) ? "&mode" : ""); ?>" >userlist</a>
	<a href="?page=tasklist<?php echo (isset($_GET["mode"]) ? "&mode" : ""); ?>" >tasklist</a>
</div>

<?php
	$sandbox = isset($_GET["mode"]) ? true : false;
	$page = isset($_GET["page"]) ? $_GET["page"] : null;
	if(file_exists(($sandbox ? "sandbox" : "pages") . "/" . $page . ".php"))
		include(($sandbox ? "sandbox" : "pages") . "/" . $page . ".php");
?>
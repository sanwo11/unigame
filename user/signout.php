<?php require_once("../api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("../index.php"); }?>
<?php
	ob_start();
	if(isset($session)){ 
		$session->logout();
		redirect_to("../index.php");
	}
	
	ob_end_flush();
?>
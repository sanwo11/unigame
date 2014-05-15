<?php require_once("api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>sginup</title>
<link rel="stylesheet" href="public/css/styl.css"/>
</head>
<body>
	<div id="wrapper">

	<h1>
        Finally! you are now official  
    </h1>
    <h2>
    	Your account will be verified within the next 24 hours we'll
		notifiy you when done... Enjoy!!. <br />
   	</h2>
    
    
     
    
    <br />
    <br />
    
   <a href="user/index.php">Continue</a>
	
	</div>
   







</body>
</html>
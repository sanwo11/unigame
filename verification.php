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
       verify your unismart account 
    </h1>
    <h2>No longting!</h2>
    
    
    <h2>choose one of the following</h2>
    
    <h3>Student Id</h3>
    <button><a href="verifyimag.php">select</a> </button>
    
    
    
    <h3>University Email Address</h3>
    <button><a href="verifyuni.php">select</a> </button>
     
    
    <br />
    <br />
    
    I'll will do this later <a href="user/index.php">Skip</a>
	
	</div>


</body>
</html>
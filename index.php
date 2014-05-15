<?php require_once("api/class/initialize.php");?>
<?php if($session->is_logged_in()){ redirect_to("user/index.php"); }?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Unismart Home</title>
<link rel="stylesheet" href="public/css/styl.css"/>
</head>
<body>
	<div id="wrapper">
    <a href="login.php">log In</a>
	<h1>
        Discounts on the things you like & conversations
    	on the things you love....
    </h1>
		sign up. it's FREE	
    <br />
    <br />
	
    <button>Sign up with Twitter </button>
	<button>Sign up with Facebook </button>
    <button>Sign up with Yahoo </button>
	
   
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    
	<a href="signup.php">Mak you sign up wit your email</a>
	</div>


</body>
</html>
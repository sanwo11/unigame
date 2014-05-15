<?php require_once("api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="3; url=http://localhost/unigame/verification.php" /> 
<title>sginup</title>
<link rel="stylesheet" href="public/css/styl.css"/>
</head>
<body>
	<div id="wrapper">

	<h1>
        This will only take 5 seconds...
    </h1>
    <h2>No longting!</h2>
    
	<div class="scorepoint">
		<?php 
				$getpoint = PointTable::find_by_id(1);
				echo $getpoint->scorepoint;
		?>
    </div>
    <br />
    <br />
	<form action="" method="post">
    	<label for="name">Name</label>
        <input type="text" name="name" value="" /><br />
        
        <label for="email">email</label>
        <input type="email" name="email" value=""  /><br />
        
        <label for="university">University</label>
        <input type="text" name="university" value="" /><br />
        
        <label for="password">Password</label>
        <input type="password" name="password" value="" /><br />
        
        <input type="submit" name="signup" value="submit am!"/>
        
    </form>
	</div>


</body>
</html>
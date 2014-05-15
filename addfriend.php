<?php require_once("api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<?php 
	if(isset($_POST['name'])){
		$addfriend = $_POST['name'];
		$date_time = strftime("%Y-%m-%d %H:%M:%S", time());
		
		foreach($addfriend as  $key => $value){	
			$vemail = trim($database->escape_value($value));		
			$database->query("insert into addfriend values ('','16', '$vemail', '{$date_time}')");		
		}
		
	}else{
		$_POST['name'] = "";
	}
?>

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
    	<?php echo $database->escape_value("it's nice");?>
        Oya invite up to 5 of your paddies!
    </h1>
    
	<div class="error"><?php echo output_message($message);?></div>
	<form action="" method="post">
       	<input type="email" name="name[]"  placeholder="type their email" />
       	<br />
        
        <input type="email" name="name[]"  placeholder="type their email" />
       	<br />
        
        <input type="email" name="name[]"  placeholder="type their email" />
        <br />
        
        <input type="email" name="name[]"   placeholder="type their email" />
        <br />
        
        <input type="email" name="name[]"   placeholder="type their email" />
        <br />
        
        <input type="submit" name="addfriends" value="submit am!"/>
        
        <br />
   		<br />
        <br />
    
    	I'll will do this later <a href="complete.php">Skip</a>
        
    </form>
	</div>


</body>
</html>
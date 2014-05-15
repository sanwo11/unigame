<?php require_once("api/class/initialize.php");?>
<?php if($session->is_logged_in()){ redirect_to("user/index.php"); }?>
<?php

	############################################
	############	Users Login  ###############
	############################################
	
	
	if(isset($_POST['login'])){
				
		$email = $_POST['email'];	// Admin username
		$password = md5($_POST['password']);	// Admin Password
		
		$login = Users::authenticate($email, $password);
		
		if($login){
			$session->message('Welcome '.$login->name);			
			$session->login($login);
			redirect_to("user/index.php");									
		}else{
			$message ="Username/Password Combination Incorrect";		
		}		
	}else{
		$email = "";
	}	


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="public/css/styl.css"/>
</head>
<body>
	<div id="wrapper">
        <a href="signup.php">Sign up</a>
        
        <br />
        <br />
        <h1>  We've missed you! </h1>
        
        <div class="error"><?php echo output_message($message);?></div>
        
       
        <form action="" method="post">
            <input type="email" name="email" placeholder="enter your email" value="<?php echo $email;?>" /><br />
            <input type="password" name="password" placeholder="enter your password" /><br />
            <small>i've forgetten my password</small><br />
            <br />
            <br />
            <input type="submit" name="login" value="login" />
        </form>
        
        
        <br />
        <br />
        
        <button>Sign up with Twitter </button>
        <button>Sign up with Facebook </button>
        <button>Sign up with Yahoo </button>
      
        
    
    
    </div>

</body>
</html>
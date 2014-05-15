<?php require_once("api/class/initialize.php");?>
<?php if($session->is_logged_in()){ redirect_to("user/index.php"); }?>
<?php
	if(isset($_POST['signup'])){
		
		$email = trim(strtolower($_POST['email']));
		$password1 = trim($_POST['password']);
		
		$checkemail = Users::find_by_email($email);
		if(!empty($checkemail->id)){			
			$message = 'email already exist';		
		}
		elseif(strlen($password1) < 8){	
			$message = ' Password must be at least 8 characters';		
		}
		else{		
			$user = new Users();		
			$user->memid = 1;	
			$user->name	= trim($_POST['name']);
			$user->email = $email;
			$user->university = trim($_POST['university']);
			$user->password = md5($password1);
			$user->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
			if($user && $user->setUserInfo()){
				//$session->message(' Error in deliver click an item ' );
				
				
				// check if the user already exist in database
				// if the user exist then update with 
				// point given
				$user_exist = ScoreTable::find_by_memberid($user->id);
				if(!empty($user_exist->id)){
					// getpoint is the point given on register
					$getpoint = PointTable::find_by_id(1);
					
					//set the table to update on user
					$scoreuser = new ScoreTable();
					$scoreuser->id = $user_exist->id;
					$scoreuser->memid = $user_exist->memid;
					$scoreuser->scorepoint = $user_exist->memid + $getpoint->scorepoint;
					$scoreuser->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
					$scoreuser->save();					
				}else{	
					// getpoint is the point given on register
					$getpoint = PointTable::find_by_id(1);
					
					//set the table to create user 
					// add point
					$scoreuser = new ScoreTable();
					$scoreuser->memid = $user->id;
					$scoreuser->scorepoint = $getpoint->scorepoint;
					$scoreuser->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
					$scoreuser->save();	
				}
				
				
				// auto login user 
				/*
					$email = $_POST['email'];	// Admin username
					$password = md5($_POST['password']);	// Admin Password
				*/
				
				$login = Users::authenticate($email, md5($password1));		
				if($login){
					$session->message('Welcome '.$login->name);			
					$session->login($login);
					redirect_to("sgnup.php");									
				}
				//redirect_to('sgnup.php');
			}else{
				$message = join('<br />', $record->errors);			
				//redirect_to('signup.php');
			}
		}
	}else{
		$_POST['name'] = "";
		$_POST['email'] = "";
		$_POST['university'] = "";
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
        This will only take 5 seconds...
    </h1>
    <h2>No longting!</h2>
    
	<div class="error"><?php echo output_message($message);?></div>
	<form action="" method="post">
    	<label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $_POST['name'];?>" /><br />
        
        <label for="email">email</label>
        <input type="email" name="email" value="<?php echo $_POST['email'];?>"  /><br />
        
        <label for="university">University</label>
        <input type="text" name="university" value="<?php echo $_POST['university'];?>" /><br />
        
        <label for="password">Password</label>
        <input type="password" name="password" value="" /><br />
        
        <input type="submit" name="signup" value="submit am!"/>
        
    </form>
	</div>


</body>
</html>
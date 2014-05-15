<?php require_once("api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<?php
	// get user id 
	$users = Users::find_by_id($session->user_id);
?>
<?php
	if(isset($_POST['university'])){
			$studentemail = $_POST['email'];			
			$studentid = StudentVerify::find_by_memberid($users->id);
			$checkemail = StudentVerify::find_by_email($studentemail);
			
			if(!empty($studentid->id)){
				$message = 'Student already exist ';	
			}elseif(!empty($checkemail->id)){			
				$message = $_POST['email'].' already exist';		
			}else{			
				$setrecord = new StudentVerify();		
				$setrecord->memid = $users->id;
				$setrecord->studentoption = 2;
				$setrecord->image = NULL;
				$setrecord->email = $studentemail;
				$setrecord->verification = 1;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->setstudentverify()){
					
					
					// check if the user already exist in database
					// if the user exist then update with 
					// point given
					$user_exist = ScoreTable::find_by_memberid($users->id);
					if(!empty($user_exist->id)){
						// getpoint is the point given on register
						$getpoint = PointTable::find_by_id(2);
						
						//set the table to update on user
						$scoreuser = new ScoreTable();
						$scoreuser->id = $user_exist->id;
						$scoreuser->memid = $user_exist->memid;
						$scoreuser->scorepoint = $user_exist->scorepoint + $getpoint->scorepoint;
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
						
						// redirect the page to any 
						//redirect_to('sgnup.php');
					}
					
					
					redirect_to('complete.php');
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			}
	}else{
		$_POST['email'] = "";
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
       verify your unismart account 
    </h1>
    <br />
    <br />
    <h1>
       University email address
    </h1>
    <div class="error"><?php echo output_message($message);?></div>
    <form action="" method="post">
    	
        <input type="email" name="email" 
        value="<?php echo $_POST['email'];?>" placeholder="eg john@unilag.student.edn.ng" />
        <input type="submit" name="university" value="save am!"/> 
        <br />
    </form>
    <br />
    <br />
    
    I'll will do this later <a href="user/index.php">Skip</a>
	
	</div>


</body>
</html>
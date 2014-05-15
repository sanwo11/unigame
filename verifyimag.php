<?php require_once("api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<?php 
	// get user id 
	$users = Users::find_by_id($session->user_id);
?>
<?php 
	$max_file_size = 102403902;
	
	############################################
	############################################
	######	Upload Student ID CARD 	 ###########
	############################################
	############################################
	
	//  image  main_name  school_address phone   school_url   email school_rank accomadation living_cost  date_time 
	if(isset($_POST['uploadcard'])){			
			$studentid = StudentVerify::find_by_memberid($users->id);
			
			if(!empty($studentid->id)){
				$message = 'Student already exist ';	
			}else{		
			
		
			$setrecord = new StudentVerify();
			$setrecord->memid = $users->id;
			$setrecord->studentoption = 1;
			$setrecord->attach_file($_FILES['upload']);
			$setrecord->email = NULL;		
			$setrecord->verification = 1;	
			$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
			if($setrecord && $setrecord->setverifyimage()){
					
					
					// check if the user already exist in database
					// if the user exist then update with 
					// point given 
					$user_exist = ScoreTable::find_by_memberid($users->id);
					if(!empty($user_exist->id)){
						// getpoint is the point given on register
						$getpoint = PointTable::find_by_id(2);
						
						//set the table to auto update on user
						$scoreuser = new ScoreTable(); 
						$scoreuser->id = $user_exist->id;
						$scoreuser->memid = $user_exist->memid;
						$scoreuser->scorepoint = $user_exist->scorepoint + $getpoint->scorepoint;
						$scoreuser->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
						$scoreuser->save();					
					}else{	
						// getpoint is the point given on register
						$getpoint = PointTable::find_by_id(2);
						
						//set the table to create user 
						// add point
						$scoreuser = new ScoreTable();
						$scoreuser->memid = $user->id;
						$scoreuser->scorepoint = $getpoint->scorepoint;
						$scoreuser->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
						$scoreuser->save();						
						
					}	
					// redirect the page to any 
					redirect_to('complete.php');
					
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
		}
	}else{
	
	
			
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
    <h1>	Upload your student ID card <br />
	
    	
       	Student ID
	
       	snap
		<br />
        
        
        Upload
		
	</h1>
    
		Drop an image or browse it from<br />
			your computer
            <br />
            <br />
     <div class="error"><?php echo output_message($message);?></div>
    <form action="" method="post" enctype="multipart/form-data">
    	
        <input type="file" name="upload"  />
        <input name="max_file_size" type="hidden" value="<?PHP  echo $max_file_size;?>" />  							
        
        <input type="submit" name="uploadcard" value="Upload Image!"/> 
        <br />
    </form>
    <br />
    <br />
    
    I'll will do this later <a href="user/index.php">Skip</a>
	
	</div>


</body>
</html>
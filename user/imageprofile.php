<?php require_once("../api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<?php 
	// get user id 
	$users = Users::find_by_id($session->user_id);
?>
<?php 
	$max_file_size = 102403902;
	
	############################################
	############################################
	######	Upload Student Ima Profile #########
	############################################
	############################################
	
	if(isset($_POST['uploadimageprofile'])){			
			$studentid = ImageProfile::find_by_memberid($users->id);
			
			if(!empty($studentid->id)){
				$message = ' Only one 1 is allowed';	
			}else{		
		
			$setrecord = new ImageProfile();
			$setrecord->memid = $users->id;
			$setrecord->attach_file($_FILES['upload']);
			$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
			if($setrecord && $setrecord->setverifyimage()){	
					$session->message('Profile image was successful');				
					redirect_to('index.php');					
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
<link rel="stylesheet" href="../public/css/styl.css"/>
</head>
<body>
	<div id="wrapper">

	<h1>
       Upload your profile image
    </h1>
    <br />
    <br />
            <br />
            <br />
     <div class="error"><?php echo output_message($message);?></div>
    <form action="" method="post" enctype="multipart/form-data">
    	
        <input type="file" name="upload"  />
       <input name="max_file_size" type="hidden" value="<?PHP  echo $max_file_size;?>" />  							
        <br />
        <input type="submit" name="uploadimageprofile" value="Upload Profile Image!"/> 
        <br />
    </form>
    <br />
    <br />
    
    I'll will do this later <a href="user/index.php">Skip</a>
	
	</div>


</body>
</html>
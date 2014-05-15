<?php require_once("../api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("../index.php"); }?>
<?php 
	
	// get user id 
	$users = Users::find_by_id($session->user_id);
	
	// get top 10 leading point user
	$leading = ScoreTable::find_top();
	
	$max_file_size = 102403902;
?>
<?php 
	
	############################################
	######	Upload Student Ima Profile #########
	############################################
	
	if(isset($_POST['Imageblog'])){			
			
			$setrecord = new Blogs();		
			$setrecord->memid = $users->id;
			$setrecord->verify = 0;
			$setrecord->title = trim($_POST['title']);
			$setrecord->attach_file($_FILES['upload']);
		
		//	$setrecord->image = NULL;
			$setrecord->content = trim($_POST['content']);
			$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
			
			if($setrecord && $setrecord->setverifyimage()){	
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 4 the id of table given the point 					
					get_point( $users->id, 4);	
									
					$session->message('nice blogs posted');				
					redirect_to('index.php');	
			}else{			
					$message = join('<br />', $setrecord->errors);	
			}
			
	}else{
		
		$_POST['title'] ="";
		$_POST['content'] ="";
			
	}
			
				
?>

<?php 
	
	############################################
	###### 		Student blog text		########
	############################################
	
	if(isset($_POST['textblog'])){			
			
			$setrecord = new Blogs();		
			$setrecord->memid = $users->id;
			$setrecord->verify = 0;
			$setrecord->title = trim($_POST['titlen']);
			$setrecord->image = NULL;
			$setrecord->content = trim($_POST['contentn']);
			$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
			
			if($setrecord && $setrecord->savetext()){	
					// it update a point table with 
					// users => id is the userlogin id 
					// @ => 4 the id of Blog table
					// update a student scorepoint by point of comment table  					
					get_point( $users->id, 4);										
					$session->message('nice blogs posted');
					// redirect to 				
					redirect_to('index.php');	
			}else{			
					$message = join('<br />', $setrecord->errors);	
			}
			
	}else{
		
		$_POST['titlen'] ="";
		$_POST['contentn'] ="";
			
	}
			
				
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../public/css/styl.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
</head>
<body>
	<div id="wrapper">
    	 <small>Share & Earn</small>
         <br />
         <br />
         
          
         <a href="index.php">Home</a>
         <a href="blog.php">Blog & Perks</a>
         
         <a href="#">About us</a>
         <a href="#">Help</a>
         
         <br />
         <a href="imageprofile.php">Profile Image</a>
         <br />
         
        <a href="signout.php">signout</a>
        <br />
        <a href="#">Count Like </a>
        <?php $profileImage = ImageProfile::find_by_memberid($users->id); ?>
        <?php if(!empty($profileImage)):?>
            <img src="../<?php echo $profileImage->image_smal_path(); ?>" />          	
        <?php else:?>
        	<small>Upload your image</small>
        <?php endif?>
        
        
        <div class="error"><?php echo output_message($message);?></div>
        <br /> 
        <!-- Check student verification table -->
        <?php $userverify = StudentVerify::find_by_memberid($users->id);?>
        
        	<!-- If the student does't exist echo nothing -->
        	<?php  if(empty($userverify->id)):	?>	
                <h1>
                    Upload either student id card or enter university email address
                    <button><a href="../verification.php">Verify Link page</a></button>
                </h1>
			<!-- If the student verification exist and equall to 1 -->
        	<?php elseif($userverify->verification == 1):?>    
                <h1>Please wait... Admin will verify </h1>
            <?php else:?>
            <!-- If the student verification equall to 2 display nothing -->     
          	<?php endif;?>
       
        	<a>text</a><br />
            <a>images</a><br />
            <a>video</a><br />
            
             	post  
             	<?php 
					$postblod = Blogs::count_by_member($users->id);
					if(!empty($postblod)){
						echo $postblod;
					}else{
					  echo 0;
					}
				?>
                <hr />
            
        	<div class="error"><?php echo output_message($message);?></div>
            
            
             <!--Text form field -->
            <h2 class="toggle"> Text </h2>
            <div class="hiddenDiv">
              	<form method="post" action="">
                	<label for="titlen">Title</label>
                    <input type="text" name="titlen" value="<?php echo $_POST['titlen'];?>" /><br />
                	<textarea cols="30" rows="15" name="contentn">
                    	<?php echo $_POST['contentn'];?>
                    </textarea><br />
                    <input type="submit" name="textblog" value="blog" />
                </form> 
           </div>
            <!-- end text form field -->
           
           
           
            <!-- end Image upload form field -->
           <h2 class="toggle"> Images </h2>
           <div class="hiddenDiv">
            
                 <form action="" method="post" enctype="multipart/form-data">
                	<label for="title">Title</label>
                    <input type="text" name="title" value="<?php echo $_POST['title'];?>" /> 
                    <br />                 
        			<input type="file" name="upload"  />
        			<input name="max_file_size" type="hidden" value="<?PHP  echo $max_file_size;?>" />
                    <br />
                	<textarea cols="30" rows="15" name="content">
                    	<?php echo $_POST['content'];?>
                    </textarea><br />
                    <input type="submit" name="Imageblog" value="blog" />
                </form> 
            </div>
             <!-- end image upload form field -->
            
            
            <!-- Vedio form field -->
            <h2 class="toggle"> Video </h2>
            <div class="hiddenDiv">
            	
                <form>
                	<label for="title">Title</label>
                    <input type="text" name="title" /><br />
                    <input type="file" name="upload"  />
        			<input name="max_file_size" type="hidden" value="<?php // echo $max_file_size;?>" /><br />
                	<textarea cols="30" rows="15">
                    
                    </textarea><br />
                    <input type="submit" name="vedioblog" value="blog" />
                </form> 
            </div>
            <!-- end Vedio form field -->
            
           
            
          <!--  
            <div class="progressinfo">
            	
            </div>
        
        -->
        
        
        
        
        
        
        
        
	</div>
    <script>
	$(document).ready(function(){
		
		$(".toggle").click(function(){
			if($(this).next().is(":hidden")){
				$(".hiddenDiv").hide();
				$(this).next().slideDown("fast");
			}else{
				$(this).next().hide();
			}
		
		});
	});
</script>
</body>
</html>
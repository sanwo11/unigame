<?php require_once("api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("index.php"); }?>
<?php 
	// get user id 
	$users = Users::find_by_id($session->user_id);	
	$userblog = empty($_GET['blogs']) ? redirect_to("index.php") : Blogs::find_by_id($_GET['blogs']);
	
	// Insert a comment on blogs
	
?>
<?php
	############################################
	###########	 Comment on blogs 	############
	############################################

	if(isset($_POST['usercomment'])){
					
				$setrecord = new Comments();		
				$setrecord->memid = $users->id;
				$setrecord->blogid = $userblog->id;
				$setrecord->comment = trim($_POST['comment']);
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->setComment()){
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 4 the id of comment table
					// update a student scorepoint by point of comment table   					
					get_point( $users->id, 5);										
					$session->message('nice comment posted');
					// redirect to 				
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
		
	}else{
		$_POST['comment'] = "";
	}
?>
<?php
	############################################
	###########	 Reply  on Comment 	############
	############################################


	if(isset($_POST['replycomment'])){
					
				$setrecord = new ReplyComment();		
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $_POST['commentid']; // comment id
				$setrecord->comment = trim($_POST['commentt']);
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->setReply()){
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 4 the id of reply comment table
					// update a student scorepoint by point of reply comment table   					
					get_point( $users->id, 7);										
					$session->message('nice comment posted');
					// redirect to 				
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
		
	}else{
		$_POST['commentt'] = "";
	}
?>

<?php
	############################################
	###########	 Like   Comment 	############
	############################################


	if(isset($_POST['likecomment'])){
			// check if the tables exist or not 
			$commentid =  $_POST['commentid'];
			$checking = LikeComment::find_blog_limit($commentid);
			if(empty($checking->id)){
				// if emtpy create a new user 
				$setrecord = new LikeComment();			
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = 1;
				$setrecord->dislikecount = 0;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 6 the id of like on point table
					// update a student scorepoint by point of reply comment table   					
					get_point( $users->id, 6);										
					// $session->message('nice comment posted');
					// redirect to 				
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			}else{
				// update the the like
				$setrecord = new LikeComment();
				$setrecord->id = $checking->id;	
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = $checking->likecount + 1;
				$setrecord->dislikecount = $checking->dislikecount;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 6 the id of like on point table
					// update a student scorepoint by point of reply comment table   					
					get_point( $users->id, 6);										
					// $session->message('nice comment posted');
					// redirect to 				
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			
			}
			
				
		
	}
?>

<?php
	############################################
	###########	 Dislike   Comment 	############
	############################################


	if(isset($_POST['dislikecomment'])){
		// check if the tables exist or not 
			$commentid =  $_POST['commentid'];
			$checking = LikeComment::find_blog_limit($commentid);
			if(empty($checking->id)){
				// if emtpy create a new user 
				$setrecord = new LikeComment();			
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = 0;
				$setrecord->dislikecount = 1;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			}else{
				// update the the like
				$setrecord = new LikeComment();
				$setrecord->id = $checking->id;			
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = $checking->likecount;
				$setrecord->dislikecount = $checking->dislikecount + 1;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			
			}
			
		
	}
?>








                            
<?php
	############################################
	###########	 Like   Reply Comment ##########
	############################################


	if(isset($_POST['replylikecomment'])){
			// check if the tables exist or not 
			$commentid =  $_POST['commentid'];
			$checking = ReplyLikeComment::find_blog_limit($commentid);
			if(empty($checking->id)){
				// if emtpy create a new user 
				$setrecord = new ReplyLikeComment();			
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = 1;
				$setrecord->dislikecount = 0;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 6 the id of like on point table
					// update a student scorepoint by point of reply comment table   					
					get_point( $users->id, 6);										
					// $session->message('nice comment posted');
					// redirect to 				
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			}else{
				// update the the like
				$setrecord = new ReplyLikeComment();
				$setrecord->id = $checking->id;	
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = $checking->likecount + 1;
				$setrecord->dislikecount = $checking->dislikecount;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					// it update a point table with 
					// users->id is the userlogin id 
					// @ => 6 the id of like on point table
					// update a student scorepoint by point of reply comment table   					
					get_point( $users->id, 6);										
					// $session->message('nice comment posted');
					// redirect to 				
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			
			}
			
				
		
	}
?>

<?php
	############################################
	###########	 Dislike Reply  Comment ########
	############################################


	if(isset($_POST['replydislikecomment'])){
		// check if the tables exist or not 
			$commentid =  $_POST['commentid'];
			$checking = ReplyLikeComment::find_blog_limit($commentid);
			if(empty($checking->id)){
				// if emtpy create a new user 
				$setrecord = new ReplyLikeComment();			
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = 0;
				$setrecord->dislikecount = 1;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			}else{
				// update the the like
				$setrecord = new ReplyLikeComment();
				$setrecord->id = $checking->id;			
				$setrecord->memid = $users->id; 
				$setrecord->blogid =  $commentid; // comment id
				$setrecord->userlike = 1;
				$setrecord->userdis = 2;
				$setrecord->likecount = $checking->likecount;
				$setrecord->dislikecount = $checking->dislikecount + 1;
				$setrecord->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				if($setrecord && $setrecord->save()){
					redirect_to('blogs.php?blogs='.$userblog->id);
				}else{			
					$message = join('<br />', $setrecord->errors);	
				}
			
			}
			
		
	}
?>

















<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $userblog->title;?></title>
<link rel="stylesheet" href="public/css/styl.css"/>
<link rel="stylesheet" href="public/css/main.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</head>
<body>
	
    	<header class="cnav">
            <section id="wrapper">
                <section class="headerleft">
                    <div class="logo">
                        <h1> Unismart</h1>
                        <h2><small>Share & Earn</small></h2>
                    </div>
                </section>
                <aside class="headerright">
                    <nav class="nav">
                        
                        <?php $profileImage = ImageProfile::find_by_memberid($users->id); ?>
                        <?php if(!empty($profileImage)):?>
                         <li> <img src="<?php echo $profileImage->image_smal_path(); ?>" />   </li>       	
                        <?php else:?>
                         <li> <span><a href="imageprofile.php">upload</a></span> </li>
                        <?php endif?>
                        
                        <li><a href="#">Count Like </a></li>
                        
                    
                        
                        <li><a href="#">Help</a></li>
                        <li> <a href="#">About us</a></li>
                        <li> <a href="blog.php">Blog & Perks</a></li>
                        <li> <a href="index.php">Home</a></li>                    
                        
                    </nav>
                </aside>
            </section>
        </header>
    
    <div id="wrapper">
		<section id="blogs">
            <h1> <?php echo $userblog->title;?> </h1>
            <?php if(!empty($userblog->image)):?>
            	<img src="<?php echo $userblog->image_big_path()?>" /><br />
            <?php else:?> 
            	
            <?php endif;?>   
            <section class="contents">
            <?php echo nl2br($userblog->content);?><br />
            <div class="error"><?php echo output_message($message);?></div>
            </section>
                <br />
                <?php $comments = Comments::find_by_blog($userblog->id);?>
                
                	<?php foreach( $comments as $comm):?>
                    <?php $username = Users::find_by_id($comm->memid);?>                    
                    <?php $replys = ReplyComment::find_by_blog($comm->id);?>
                   
                    <div class="comment">
                    	<div>
                    	<div class="like_dis_share">
                    	<!-- LIKE BUTTON-->
                        <?php $like = LikeComment::find_blog_limit($comm->id); ?>
                        <form action="blogs.php?blogs=<?php echo $userblog->id?>" method="post">                        	<input type="hidden" name="commentid" value="<?php echo $comm->id;?>"/>
                 <input type="submit" name="likecomment" value="Like <?php  echo !empty($like->likecount) ? $like->likecount : '';?>"/> 
                        </form>
                        </div>
                        <!-- END LIKE BUTTON-->
                        
                        
                        <!-- LIKE BUTTON-->
                        <div class="like_dis_share">
                        <?php $dlk = LikeComment::find_blog_limit($comm->id, 2); ?>
                        <form action="blogs.php?blogs=<?php echo $userblog->id?>" method="post">                        	<input type="hidden" name="commentid" value="<?php echo $comm->id;?>"/>
          <input type="submit" name="dislikecomment" value="Dislike <?php echo !empty($dlk->dislikecount) ? $dlk->dislikecount : '';?>"/> 
                        </form>
                        </div>
                        <!-- END DISLIKE BUTTON-->
                        <div class="like_dis_share">
                       	 <button>share</button><br />
                        </div>
                        </div>
                        
                        
                        <?php echo $username->name;?> says..  <?php time_ago($comm->date_time);?><br />
                        <hr />                                             
                    	<?php echo $comm->comment;?> <br />
                        <p class="toggle">Reply</p>
                        <div class="hiddenDiv">
                            <form action="blogs.php?blogs=<?php echo $userblog->id?>" method="post">
                            	<input type="hidden" name="commentid" value="<?php echo $comm->id;?>"/>
                                <textarea cols="57" rows="5" name="commentt">
                                    <?php echo $_POST['commentt'];?>
                                </textarea><br />
                            	<input type="submit" name="replycomment" value="reply"/> 
                            <br />
                            </form>  
                        </div>                                    
                    </div>
                    	<!-- Reply comment -->
                        
						<?php foreach( $replys as $reply):?>
                         <?php $replyuser = Users::find_by_id($reply->memid);?> 
                        <div class="reply">
                        	<!-- Like Dislike Share on Relpy Comment-->
                            
                        <div>
                            <div class="like_dis_share">
                            <!-- LIKE BUTTON-->
                            <?php $like = ReplyLikeComment::find_blog_limit($reply->id); ?>
                            <form action="blogs.php?blogs=<?php echo $userblog->id?>" method="post">                        	<input type="hidden" name="commentid" value="<?php echo $reply->id;?>"/>
                     <input type="submit" name="replylikecomment" value="Like <?php  echo !empty($like->likecount) ? $like->likecount : '';?>"/> 
                            </form>
                            </div>
                            <!-- END LIKE BUTTON-->
                            
                            
                            <!-- LIKE BUTTON-->
                            <div class="like_dis_share">
                            <?php $dlk = ReplyLikeComment::find_blog_limit($reply->id, 2); ?>
                            <form action="blogs.php?blogs=<?php echo $userblog->id?>" method="post">                        	<input type="hidden" name="commentid" value="<?php echo $reply->id;?>"/>
              <input type="submit" name="replydislikecomment" value="Dislike <?php echo !empty($dlk->dislikecount) ? $dlk->dislikecount : '';?>"/> 
                            </form>
                            </div>
                            <!-- END DISLIKE BUTTON-->
                            <div class="like_dis_share">
                             <button>share</button><br />
                            </div>
                        </div>
                            
                            <!-- End of like Dislike Share on Reply Comment -->
                        <?php echo $replyuser->name;?> says..  <?php time_ago($reply->date_time);?><br />
                        	<hr /> 
                           <?php echo $reply->comment;?>
                        </div>
                        <?php endforeach;?>
                        <!-- End Reply comment -->
                    <?php endforeach;?>
                
                	
             
           	
                
            <form action="blogs.php?blogs=<?php echo $userblog->id?>" method="post">
                    <textarea cols="60" rows="5" name="comment"><?php echo $_POST['comment'];?></textarea><br />
                    <input type="submit" name="usercomment" value="comment"/> 
                    <br />
            </form>
            
		</section>
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
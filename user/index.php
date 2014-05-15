<?php require_once("../api/class/initialize.php");?>
<?php if(!$session->is_logged_in()){ redirect_to("../index.php"); }?>
<?php 
	
	// get user id 
	$users = Users::find_by_id($session->user_id);
	
	// get top 10 leading point user
	$leading = ScoreTable::find_top();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../public/css/styl.css"/>
<link rel="stylesheet" href="../public/css/main.css"/>
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
                     <li> <img src="../<?php echo $profileImage->image_smal_path(); ?>" />   </li>       	
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
    	<h1 class="verified">                    
                    <!-- Check student verification table -->
					<?php $userverify = StudentVerify::find_by_memberid($users->id);?>
                    
                        <!-- If the student does't exist echo nothing -->
                        <?php  if(empty($userverify->id)):	?>	
                            
                        <!-- If the student verification exist and equall to 1 -->
                        <?php elseif($userverify->verification == 1):?>    
                            <h1 class="verified">Please wait... Admin will verify </h1>
                        <?php else:?>
                        <!-- If the student verification equall to 2 display nothing -->
                        <h1 class="verified"> 
                        	Upload either student id card or enter university email address
                    		<a href="../verification.php">Verify</a> 
                        </h1>    
                        <?php endif;?>
      	
    	 
        <a href="signout.php">signout</a>       
        <div class="error"><?php echo output_message($message);?></div>
        
    	<h2 class="welcome">
    		Welcome <?php echo !empty($users->name)? $users->name.'!' : 'Update ur profile' ;?>
        </h2>
       
        <div class="complete">
        	<h3>Account Progress</h3>
        	<li>Sign </li><li>Set up </li><li>Completed</li>
        </div>
        <br /><br /><br /><br /><br />
        <!--<div class="progressinfo">
        	<h2> Post Blog</h2>
            <?php $veiwblogs = Blogs::find_all_blog($users->id);?>
            
            <table>
            	<thead>
                	<tr>
                    	
                    	<th>Title</th>
                        <th>Date</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
               	 	<?php $postblod = Blogs::count_by_member($users->id);?>
                    <?php // for($i=1; $i<=$postblod; $i++ ):?>
                		<?php foreach( $veiwblogs as $key => $veiw):?>
                        <?php $postblod = Comments::count_by_blog($veiw->id);?>
                     
                    
                	<tr>
                     	
                        	
                    		<td style="font-size:10px;">
                            	<a href="../blogs.php?blogs=<?php // echo $veiw->id;?>">
									<?php // echo $veiw->title;?>
                                </a>
                            </td>
                        	<td style="font-size:10px;"><?php // echo datetime_to_text($veiw->date_time);?></td>
                            <td><?php // echo !empty($postblod) ? $postblod : 0 ?></td>
                           
                    	
                    </tr>
                   
                    <?php endforeach;?>
                    <?php // endfor;?>
                </tbody>
        	
           
            	
            	
            
            </table>
        </div>-->
        
        
        <section >
        	<section class="pointscore">
            	<div>
                	<?php $profileImage = ImageProfile::find_by_memberid($users->id); ?>
                    <?php if(!empty($profileImage)):?>
                    <img src="../<?php echo $profileImage->image_big_path(); ?>" />       	
                    <?php else:?>
                    <?php endif?>
                </div>
                <div>
                	<h4>My Points  </h4>
					<?php 
                            $userpoint = ScoreTable::find_by_memberid($users->id);
                            echo  '<p class="poin">'. number_format($userpoint->scorepoint).'</p>';
                    ?>
                </div>
            	
            
            </section>
            <aside class="profile">
            	<!--
                10 for signing up <br />
                15 adding people you may know<br />
                25 inviting/adding friends<br />
                
                50 verification
                -->
                <table>
            	<thead>
                	<tr>
                    	
                    	<!--<th style="font-size:10px;">Title</th>-->
                        <th style="font-size:10px; padding-right:4em;">Date</th>
                        <th style="font-size:10px;">Comment</th>
                    </tr>
                </thead>
                <tbody>
               	 	<?php $postblod = Blogs::count_by_member($users->id);?>
                    <?php // for($i=1; $i<=$postblod; $i++ ):?>
                		<?php foreach( $veiwblogs as $key => $veiw):?>
                        <?php $postblod = Comments::count_by_blog($veiw->id);?>
                     
                    
                	<tr>
                     	
                        	<!--
                    		<td style="font-size:10px;">
                            	<a href="../blogs.php?blogs=<?php // echo $veiw->id;?>">
									<?php // echo $veiw->title;?>
                                </a>
                            </td>-->
                        	<td style="font-size:10px; padding-right:4em;">
								<a href="../blogs.php?blogs=<?php echo $veiw->id;?>">
									<?php echo datetime_to_inbox($veiw->date_time);?>
                                </a>
                           	</td>
                            <td style="font-size:10px; padding-right:4em;">
								<?php echo !empty($postblod) ? $postblod : 0 ?>
                            </td>
                           
                    	
                    </tr>
                   
                    <?php endforeach;?>
                    <?php // endfor;?>
                </tbody>
        	
           
            	
            	
            
            </table>
            </aside>
       	</section>
 	    <br /><br /><br /><br /><br />
        <br /><br /><br /><br /><br />
        <br /><br /><br /><br /><br />
        
       <!-- 
       	<div class="progressinfo">
            Leaderboard
            My Position
            
            Top 10 
            <?php // foreach($leading as $lead):?>
            	<?php // echo $lead->memid;?> <?php // echo $lead->scorepoint;?>
            <?php // endforeach;?>
        </div>
       -->
        
        
        
        
        
        
        
        
        
        
        
        
	</div>
</body>
</html>
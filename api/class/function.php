<?php
		ob_start();
		function redirect_to( $location = NULL ) {
		  if ($location != NULL) {
			header("Location: {$location} ");
			exit;
		  }
		}
		
		
		function datetime_to_text($datetime="") {
 		 	$unixdatetime = strtotime($datetime);
  			return strftime("%d %b, %Y at %I:%M %p", $unixdatetime);
		}
		
		function datetime_to_inbox($datetime="") {
 		 	$unixdatetime = strtotime($datetime);
  			return strftime("%d %b, %Y", $unixdatetime);
		}
			
		function __autoload($class_name){
			$class_name = strtolower($class_name);
			$path = "{$class_name}.php";
			if(file_exists($path)){
					require_once($path);
				}else{
				die ("The file {$class_name}.php could not be found. ");
			}
		}
		
		function output_message($message=""){
				if(!empty($message)){
				//	return "<p class=\"message\"> {$message}";
					return $message;
				}else{
					return "";
				}
					
		}
		
		function output_error($errors){
				if(!empty($errors)){
				 	foreach( $errors as $field_error){
					//echo  $field_error."</br>"; }
					echo "<p style=\"color:#700107; font-family:Tw Cen MT;\">{$field_error}</p>"."</br>";
					}
				  }	
		}
		
		function site_template($tem=""){			
			require_once( SITE_ROOT.DS.'template'.DS.$tem );
		}
		
		function PwdHash($pwd, $salt = null)
		{
			define('SALT_LENGTH', 9); // salt for password
			
			if ($salt === null)
				{
					$salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
				}
			else
				{
					$salt = substr($salt, 0, SALT_LENGTH);
				}
			return $salt . sha1($pwd . $salt);
		}
		function sign_out($sign_out){
			if(isset($session)){ 
				$session->logout();
				//$session->message("You have successfully logged out");
				redirect_to($sign_out);
			}	
		}
		
		
		 function time_ago($datetime){
			  $time=strtotime($datetime);
			//  $diff = strftime("%Y-%m-%d %H:%M:%S", time()) - $time;
			  
			  $diff= time()-$time;
			  $diff/=60;
			  $var1=floor($diff);
			  $var=$var1<=1 ? 'min' : 'mins';
			  if($diff>=60){
				$diff/=60;
				$var1=floor($diff);
				$var=$var1<=1 ? 'hr' : 'hrs';
			  }
			  if($diff>=24){
				$diff/=24;
				$var1=floor($diff);
				$var=$var1<=1 ? 'day' : 'days';
			  }
			  if($diff>=30.4375){
				$diff/=30.4375;
				$var1=floor($diff);
				$var=$var1<=1 ? 'month' : 'months';
			  }
			  if($diff>=12*24){
				$diff/=12*24;
				$var1=floor($diff);
				$var=$var1<=1 ? 'year' : 'years';
			   }
			  echo $var1,' ',$var,' ago';
		  }
		
		function get_point( $userid, $tbpoint){
			// users->id, pointtable value =>4 , 
			$user_exist = ScoreTable::find_by_memberid($userid);
			if(!empty($user_exist->id)){
				// getpoint is the point given on register
				// Id => 4  verchar bloging in PointTable
				$getpoint = PointTable::find_by_id($tbpoint);
						
				//set the table to auto update on user
				$scoreuser = new ScoreTable(); 
				$scoreuser->id = $user_exist->id;
				$scoreuser->memid = $user_exist->memid;
				$scoreuser->scorepoint = $user_exist->scorepoint + $getpoint->scorepoint;
				$scoreuser->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				$scoreuser->save();					
			}else{	
				// getpoint is the point given on register
				// Id => 4  verchar bloging in PointTable
				$getpoint = PointTable::find_by_id($tbpoint);
					
				//set the table to create user 
				// add point
				$scoreuser = new ScoreTable();
				$scoreuser->memid = $userid;
				$scoreuser->scorepoint = $getpoint->scorepoint;
				$scoreuser->date_time = strftime("%Y-%m-%d %H:%M:%S", time());
				$scoreuser->save();					
			}	
		
		}
					
?>
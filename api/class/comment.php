<?php 	require_once('database.php');	?>
<?php
	// this is Comment Class 
	// Check down the page to see other classess 
		// Reply Comment Class 
		// Like Comment Class 
		// ReplyLikeComment Comment Class 
		
	class Comments extends DatabaseObject{
		
	protected static $table_name = "Comment";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'blogid',
	'comment',
	'date_time'
	);
	
	
	public $id;
	public $memid;	//  public users
	public $blogid;	//  blog uniqic number
	public $email;
	public $comment;
	public $date_time;
	
	

	
	
		
	public $errors = array();

	
	// registration method 
	public function setComment(){
		if(!empty($this->errors)){ 	return false; }
		
		if(empty($this->memid)){ $this->errors[] = " You are not a member, please register.";
			return false;
		}				
		if(empty($this->comment)){ 	$this->errors[] = " Please enter your comment.";
			return false;
		}				
		else{
			$this->save();			
			return true;				
		}	
	}
	
	
	}
	

	
	
	
	// Reply a comment likecomment
	
	class ReplyComment extends DatabaseObject{
		
	protected static $table_name = "replycomment";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'blogid',
	'comment',
	'date_time'
	);
	
	
	public $id;
	public $memid;	//  public users
	public $blogid;	//  comment id
	public $comment;
	public $date_time;
	
	

	
	
		
	public $errors = array();

	
	// registration method 
	public function setReply(){
		if(!empty($this->errors)){ 	return false; }
		
		if(empty($this->memid)){ $this->errors[] = " You are not a member, please register.";
			return false;
		}				
		if(empty($this->comment)){ 	$this->errors[] = " Please enter your comment.";
			return false;
		}				
		else{
			$this->save();			
			return true;				
		}	
	}
	
	
	}
	
	
	
	class LikeComment extends DatabaseObject{
		
	protected static $table_name = "likecomment";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'blogid',
	'userlike',
	'userdis',
	'likecount',
	'dislikecount',
	'date_time',	
	
	);
	
	
	public $id;
	public $memid ;			//  public users
	public $blogid;			//  comment id
	public $userlike;		//  like var @ 1
	public $userdis;		//  like var @ 2
	public $likecount;		//  count + 1 update
	public $dislikecount;	//  dis count + 1 update
	public $date_time;		//  public users
	
	
	
	public $errors = array();

	
	}
	
	class ReplyLikeComment extends DatabaseObject{
		
	protected static $table_name = "likereply";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'blogid',
	'userlike',
	'userdis',
	'likecount',
	'dislikecount',
	'date_time',	
	
	);
	
	
	public $id;
	public $memid ;			//  public users
	public $blogid;			//  comment id
	public $userlike;		//  like var @ 1
	public $userdis;		//  like var @ 2
	public $likecount;		//  count + 1 update
	public $dislikecount;	//  dis count + 1 update
	public $date_time;		//  public users
	
	
	
	public $errors = array();

	
	}
	
	
	
	
	
?>
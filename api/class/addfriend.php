<?php 	require_once('database.php');	?>
<?php
	
//	id,userid, register,verification, blogpost,addfriend, comment, likebtn

	class AddFriend extends DatabaseObject{
		
	protected static $table_name = "addfriend";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'email',
	'date_time'
	);
	
	
	public $id;
	public $memid;	// either admin or public users
	public $email;
	public $date_time;
			
	public $errors = array();
	
	
	
	}
	
	
?>
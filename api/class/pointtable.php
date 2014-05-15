<?php 	require_once('database.php');	?>
<?php
	
//	id,userid, register,verification, blogpost,addfriend, comment, likebtn

	class PointTable extends DatabaseObject{
		
	protected static $table_name = "pointtable";		
	protected static $db_fields = array( 
	
	'id',
	'scorename',
	'scorepoint',
	'date_time'
	);
	
	
	public $id;
	public $scorename;	// either admin or public users
	public $scorepoint;
	public $date_time;
			
	public $errors = array();
	
	
	
	}
	
	
?>
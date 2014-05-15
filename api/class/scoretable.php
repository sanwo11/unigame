<?php 	require_once('database.php');	?>
<?php

	class ScoreTable extends DatabaseObject{
		
	protected static $table_name = "scoretable";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'scorepoint',
	'date_time'
	);
	
	
	public $id;
	public $memid;	// either admin or public users
	public $scorepoint;
	public $date_time;
			
	public $errors = array();
	
	
	
	}
	
	
?>
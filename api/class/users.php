<?php 	require_once('database.php');	?>
<?php
	

	class Users extends DatabaseObject{
		
	protected static $table_name = "users";		
	protected static $db_fields = array( 
	
	'id',
	'memid',
	'name',
	'email',
	'university',
	'password',
	'date_time'
	);
	
	
	public $id;
	public $memid;	// either admin or public users
	public $name;
	public $email;
	public $university;
	public $password;
	public $date_time;
	
	

	
	
		
	public $errors = array();
	
	
	public static function authenticate($username="", $password=""){
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
			
		$sql  = "SELECT * FROM ".static::$table_name;
		$sql .= " WHERE email = '{$username}' ";
		$sql .= " AND password = '{$password}' ";  
		$sql .= " LIMIT 1";
		$query_array = self::find_by_sql($sql);
		return !empty($query_array)? array_shift($query_array): false;	
	}
	
	// registration method 
	public function setUserInfo(){
		if(!empty($this->errors)){ 
				return false; 			
		}
		if(empty($this->name)){ 
		$this->errors[] = " Please enter your name.";
		return false;
		}
		
		if(empty($this->email)){ 
		$this->errors[] = " Please enter your email.";
		return false;
		}
		if(empty($this->university)){ 
		$this->errors[] = " Please enter your university.";
		return false;
		}
		
		if(empty($this->password)){ 
		$this->errors[] = " Please enter your password.";
		return false;
		
		}		
		else{
			$this->save();			
			return true;				
		}
	
	}
	
	
	}
	
	
?>
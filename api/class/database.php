<?php	require_once('config.php'); ?>

<?php
	
	class MySQLDatabase{
		
		private $connection;
		private $magic_quotes_active;
		private $new_enough_php ;
	
			function __construct(){
				$this->open_connection();
				$this->magic_quotes_active = get_magic_quotes_gpc();
				$this->new_enough_php = function_exists( "mysqli_real_escape_string" ); 
			}
			
		public function open_connection(){
				// Database username and password 			
				$this->connection = new mysqli(DB_SERVER,DB_USER,DB_PASWORD, DB_NAME);
				if(mysqli_connect_error()){
					die("Database not Connected".mysqli_connect_error());
				}				
		}
		
		public function escape_value( $value ) { 
			if( $this->new_enough_php ) { // PHP v4.3.0 or higher
				// undo any magic quote effects so mysql_real_escape_string can do the work
				if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
				$value = mysqli_real_escape_string( $this->connection, $value );
			} else { // before PHP v4.3.0
				// if magic quotes aren't already on then add slashes manually
				if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
				// if magic quotes are active, then the slashes already exist
			}
			return $value;
		}
		
		public function close_connection(){
			// mysqli_close Connenction
			if(isset($this->connection)){
				mysqli_close($this->connection);
				unset($this->connection);
			}
		}
		
		public function query($sql){
			// mysqli get query from DB
			$result = $this->connection->query( $sql );
			$this->confirm_query($result);
			return $result;
		}
		
		private function confirm_query($result){
			// Query validation approche
			if(!$result){
				die(" Query not Selected ".$this->connection->error);
				//return redirect_to('error.php');
			}
		}
		
		//  Database Neutral
		
		public function num_rows($result_set){
			return mysqli_num_rows($result_set);
		}
		
				
		public function fetch_array($result_set){
			return $result_set->fetch_array(MYSQLI_BOTH);
		}
		
		public function affected_row(){
			return mysqli_affected_rows($this->connection);
		}
		
		public function insert_id(){
			return mysqli_insert_id($this->connection);
		}
	}
	
	$database = new MySQLDatabase();
	
?>
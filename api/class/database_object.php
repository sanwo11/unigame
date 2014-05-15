<?php	require_once('database.php'); ?>
<?php
	
	class DatabaseObject{
		protected static $table_name;
		
	// 
	
	
	// all blogs by a perticuler member
	public static function find_all_blog($id){
		global $database;
		$sql  = "SELECT * FROM ".static::$table_name;
		$sql .=" WHERE memid ='".$database->escape_value($id)."'";
		$sql .= " ORDER BY date_time DESC ";
		return static::find_by_sql($sql);
	}
	
	// all comment by a user member by blog id
	public static function find_by_blog($id){
		global $database;
		$sql  = "SELECT * FROM ".static::$table_name;
		$sql .=" WHERE blogid ='".$database->escape_value($id)."'";
		$sql .= " ORDER BY date_time DESC ";
		return static::find_by_sql($sql);
	}
	
	// all comment by a user member by blog id limit 1
	public static function find_blog_limit($id){
		global $database;
		$sql  = "SELECT * FROM ".static::$table_name;
		$sql .=" WHERE blogid ='".$database->escape_value($id)."'";
		$sql .= " LIMIT 1 ";
		$query_array = static::find_by_sql($sql);
		return !empty($query_array)? array_shift($query_array): false;
	}
	
	
	
	public static function find_by_email($email){
		global $database;
		$sql  = "SELECT * FROM ".static::$table_name;
		$sql .=" WHERE email ='".$database->escape_value($email)."'";
		$sql .= " LIMIT 1 ";
		$query_array = static::find_by_sql($sql);
		return !empty($query_array)? array_shift($query_array): false;
	}
	
	public static function find_by_memberid($id){
		global $database;
		$sql  = "SELECT * FROM ".static::$table_name;
		$sql .=" WHERE memid ='".$database->escape_value($id)."'";
		$sql .= " LIMIT 1 ";
		$query_array = static::find_by_sql($sql);
		return !empty($query_array)? array_shift($query_array): false;
	}
	
	public static function find_top(){
		return static::find_by_sql("SELECT MAX(scorepoint) FROM ".static::$table_name);
	}
	
	
	// count total memeber like or dislike a comment // like_dis
	public static function count_by_like($id, $num){
		global $database;
		$sql  = " SELECT COUNT(*) FROM ".static::$table_name;
		$sql .=" WHERE blogid ='".$database->escape_value($id)."'";
		$sql .=" AND like_dis ='".$database->escape_value($num)."'";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}
	
	// count total member on uniqic id
	public static function count_by_member($id){
		global $database;
		$sql  = " SELECT COUNT(*) FROM ".static::$table_name;
		$sql .=" WHERE memid ='".$database->escape_value($id)."'";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}
	
	// count per blog posted on uniqic id
	public static function count_by_blog($id){
		global $database;
		$sql  = " SELECT COUNT(*) FROM ".static::$table_name;
		$sql .=" WHERE blogid ='".$database->escape_value($id)."'";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}
	
	
	
	public static function find_all(){
		return static::find_by_sql("SELECT * FROM ".static::$table_name." ORDER BY date_time DESC ");
	}	
	
	public static function find_by_id($id=0){
		global $database;
		$sql = "SELECT * FROM ".static::$table_name." WHERE id =".$database->escape_value($id)." LIMIT 1";
		$query_array = static::find_by_sql($sql);
		return !empty($query_array)? array_shift($query_array): false;			
	}
		
		
	public static function count_all(){
		global $database;
		$sql  = " SELECT COUNT(*) FROM ".static::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}
	public static function find_by_sql($sql=""){
		global $database;
			$query = $database->query($sql);
			$result_array = array();
			while( $row = $database->fetch_array($query)){
				$result_array[] = static::instantiate($row); 
			}		
				return $result_array;					
		}
		
				
	
		private static function instantiate($record){
			$class_name = get_called_class();
			$object = new $class_name;
			//$object->id 		= $record['id'];
			//$object->username	= $record['username'];
			//$object->password 	= $record['password'];
			//$object->email 		= $record['email'];
			//$object->firstname 	= $record['firstname'];
			//$object->lastname 	= $record['lastname'];	
			
			// More Dynamic short-form Approcha
			foreach($record as $attribute=>$value){
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}			
			
			return $object;	
		}
		
		private function has_attribute($attribute){
			return array_key_exists( $attribute, $this->attributes());
		}
		
		
		protected function attributes(){
			 $field_array = array();
			 foreach(static::$db_fields as $fields){
			 	if( property_exists($this, $fields) ){
					 $field_array[$fields] = $this->$fields;
				}
			 }
			 return $field_array ;
		}
		
		protected function sanitazed_attributes(){
			global $database;
			$clear_attributes = array();
			foreach($this->attributes() as $key => $values ){
				$clear_attributes[$key] = $database->escape_value($values);
			}
			return $clear_attributes;
		}
		
		public function save(){
			global $database;
			return isset($this->id)? $this->update() : $this->create();
		}
		
		public function create(){
			global $database;
			$attributes = $this->sanitazed_attributes();
			$sql   = "INSERT INTO ".static::$table_name." ("; 
			$sql  .= join(" , " , array_keys($attributes));
			$sql  .= ") VALUES ('";
			$sql  .= join("' , '" , array_values($attributes));
			$sql  .= "')" ;
				if($database->query($sql)){
					$this->id = $database->insert_id();
					return true;
				}else{
					return false;
				}		
		}
	
		public function update(){
			global $database;
			$attributes = $this->sanitazed_attributes();
			$attribute_pairs = array();
			foreach($attributes as $keys => $values){
				$attribute_pairs[] = " {$keys} = '{$values}'";
			}
			
			$sql  = "UPDATE ".static::$table_name." SET ";
			$sql .= join(", ", $attribute_pairs);
			$sql .= " WHERE id=". $database->escape_value($this->id);
				$database->query($sql);
				return ($database->affected_row() == 1)? true: false;		
		}
		
		public function delete(){
			global $database;
			$sql  =" DELETE FROM ".static::$table_name;
			$sql .=" WHERE id=".$database->escape_value($this->id)." LIMIT 1";
			$database->query($sql);
				return ($database->affected_row() == 1)? true: false;
		
		}
		
}
?>

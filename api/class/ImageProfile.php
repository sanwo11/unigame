<?php 	require_once('database.php');	?>
<?php
	
//	id,userid, register,verification, blogpost,addfriend, comment, likebtn

	class ImageProfile extends DatabaseObject{
		
	protected static $table_name = "profileimage";		
	protected static $db_fields = array( 
	
	'id', 
	'memid',
	'image',
	'date_time'
	
	);
	
	public $id;
	public $memid;
	public $image;
	public $date_time;
	
	
	private $tem_path;
	protected $main_path = "profileimage";
	protected $img_path  = "mainImage";  // resize the image before remove
	protected $bigImage  = "bigImage";
	protected $smalImage = "smalImage";
	
	public $errors = array();
	
	
	protected $upload_errors = array(
	// http://www.php.net/manual/en/features.file-upload.errors.php
		UPLOAD_ERR_OK 				=> "No errors.",
		UPLOAD_ERR_INI_SIZE  		=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 		=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 			=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 			=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR 		=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE 		=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 		=> "File upload stopped by extension."
	);
	
	
	
	public function attach_file($file){
			if(!$file || empty($file) || !is_array($file)){
				$this->errors[] = "No File was uploaded " ;
				return false;
			}elseif( $file['error'] != 0){
				$this->errors[] = $this->upload_errors[$file['error']];
				return false;
			}elseif( $file['size'] == 0){
				$this->errors = " File is empty ";
				return false;
			}else{
				$extensions = array("jpeg","jpg","png"); 
				$file_ext = explode('.',$file['name']);					
				$file_ext = end($file_ext);
				$file_ext = strtolower($file_ext);
				if(in_array($file_ext, $extensions ) === false){
				$this->errors[] = "extension not allowed";
				return false;
				}else{
			
				$db_file = time()."".date("Y")."".rand(100000000000, 99999999999)."".time()."_".$file['name'];			
				$this->tem_path = $file['tmp_name'];
				$this->image = basename($db_file);
			//	$this->size = $file['size'];
				return true;
				}		
			}
	}
	
	
	private function save_Image(){
			//parent::save();
			if(isset($this->id)){	
				$this->update();		
			}else{		
				if(empty($this->image ) && empty($this->tem_path ) ){
				$this->errors[] = " The file location was not available ";
				return false;
			}
				$terger_path = SITE_ROOT.DS.$this->main_path.DS.$this->img_path.DS.$this->image; 
				if(file_exists($terger_path)){ 
				$this->errors[] = " The file {$this->image} already exist ";
				return false;
				}
					
				if(move_uploaded_file($this->tem_path, $terger_path)){					
				$exe = explode(".", $this->image);
				$ext = $exe[1];
				$w = 200;
				$h = 200;
				$target = SITE_ROOT.DS.$this->main_path.DS.$this->img_path.DS.$this->image;				
				$newcopy = SITE_ROOT.DS.$this->main_path.DS.$this->bigImage.DS.$this->image; 
				list($w_orig, $h_orig) = getimagesize($target);
				$scale_ratio = $w_orig / $h_orig;
				if (($w / $h) > $scale_ratio) {
				   $w = $h * $scale_ratio;
				} else {
				   $h = $w / $scale_ratio;
				}
				$img = "";
				$ext = strtolower($ext);
				if ($ext == "gif"){ 
				$img = imagecreatefromgif($target);
				} else if($ext =="png"){ 
				$img = imagecreatefrompng($target);
				} else { 
				$img = imagecreatefromjpeg($target);
				}
				$tci = imagecreatetruecolor($w, $h);
				imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
				//////// SMALL Image ///////////////
				if(@imagejpeg($tci, $newcopy, 80)){				
					$targetc  = SITE_ROOT.DS.$this->main_path.DS.$this->img_path.DS.$this->image;
					if(file_exists($targetc)){	
								
						$widthc  = 50;
						$heightc = 50;
										
						$targetm  = SITE_ROOT.DS.$this->main_path.DS.$this->img_path.DS.$this->image;
						$newcopyc  = SITE_ROOT.DS.$this->main_path.DS.$this->smalImage.DS.$this->image;
						// Get new dimensions
						list($width_origc, $height_origc) = getimagesize($targetm);
						$ratio_origc = $width_origc/$height_origc;
						if ($widthc/$heightc > $ratio_origc) {
						$widthc = $heightc*$ratio_origc;
						} else {
						$heightc = $widthc/$ratio_origc;
						}
						// Resample
						$image_pc = imagecreatetruecolor($widthc, $heightc);
						if ($ext == "gif"){ 
						$imagec = imagecreatefromgif($targetm);
						} else if($ext =="png"){ 
						$imagec = imagecreatefrompng($targetm);
						} else { 
						$imagec = imagecreatefromjpeg($targetm);
						}
				imagecopyresampled($image_pc, $imagec, 0, 0, 0, 0, $widthc, $heightc, $width_origc, $height_origc);
							if(imagejpeg($image_pc, $newcopyc, 80)){
								$terger_pathc = SITE_ROOT.DS.$this->main_path.DS.$this->img_path.DS.$this->image;
								//unlink($terger_pathc);
								return unlink($terger_pathc) ? true : false;								
							}										
					}				
				}					
					
				}else{
					$this->errors[] = " The file uploaded failed, possibly due to incorrect permissions on upload file  ";
					return false;
				}	
			}
		}//end of save
	
	
	public function setverifyimage(){
		if(!empty($this->errors)){ 
			return false; 			
		}
		else{
			$this->save_Image();				
			if($this->create()){
			unset($this->tem_path);
			return true;
			}
		}
	}
	
	
	public function image_big_path(){
			return 'api'.DS.$this->main_path.DS.$this->bigImage.DS.$this->image;	
	}
	
	public function image_smal_path(){
			return 'api'.DS.$this->main_path.DS.$this->smalImage.DS.$this->image;	
	}
	
	
	}
	
	
?>
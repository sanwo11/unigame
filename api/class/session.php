<?PHP
	
	class Session{
		
		private $logged_in = false;
		public $user_id;	// Admin login id tracker 
		public $message;
		
		
		function __construct(){
			$session = sha1(md5(base64_encode('!#923N@&%ND*&#%@$390SvmGdbgddhhdjs')));
			//session_set_cookie_params(0);
			session_name($session);
			session_start();
			$this->check_login();
			$this->check_message();
			
		}
		
		public function is_logged_in(){
			return $this->logged_in;
		}
		
		
		public function login($user){
			if($user){
				$this->user_id = time().$_SESSION['4j2UserID'] = $user->id;
				$this->logged_in = true;
			}
		}
		
		public function logout(){
			unset($_SESSION['4j2UserID']);
			unset($this->user_id);
			$this->logged_in = false;
		}
		
		
		
		
		
		public function message($msg=""){
			if(!empty($msg)){
				$_SESSION['message'] = $msg;
			}else{
				return $this->message;
			}
		}
		
		private function check_message(){
			if(isset($_SESSION['message'])){
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);
			}else{
				$this->message ="";
			}
		
		}
		
		private function check_login(){
			if(isset($_SESSION['4j2UserID'])){
				$this->user_id = $_SESSION['4j2UserID'];
				$this->logged_in = true;				
			}else{
				unset($this->user_id);
				$this->logged_in = false;
			}		
		}

	
	}
	
		$session = new Session();
		$message = $session->message();
?>
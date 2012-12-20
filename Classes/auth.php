<?php

	class Auth {
		private $_siteKey;
		protected $conn;
		
		public function __construct {
			$this->siteKey = "f4r6rfdes245g/%(7534!£3*èàf°_gtszf yrt|e$&ç[#¶ŧged";
			$this->conn = new Database();
		}
		
		public function isAdmin(){
			
			$selection = $this->conn->select('utenti', "WHERE is_admin = :id", '', 'LIMIT 1',1);
			
			if ($selection['is_admin'] == 1){
				return true;
			}
			
			return false;
		}
		
		public static function user ($email, $password, $is_admin = 0){
			//generating users salt
			$user_salt = $this->randomString();
			
			//salt and hash the password
			$password = $user_salt . $password;
			$password = $this->hashData($password);
			
			//create a verification code
			$verificationCode = $this->randomString();
			
			//add user
			$created = User::create(array(
									':id' => null,
									':e_mail' => $email,
									':password' => $password,
									':data_inserimento' => Date::phpToMySQL( time() ),
									':user_salt' => $user_salt,
									':is_verified' => 0,
									':is_active' => 0,
									':is_admin' => 0,
									':verification_code' => $verificationCode
			));
			
			if ($created != false){
				return true;
			}
			
			return false;
		} 
		
		private function randomString($length = 50){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
			$string = '';
			
			for ($p = 0; $p < $length; $p++ ){
				$string .= $characters[mtrand(0, strlen($characters)-1)];
			}
			
			return $string;
		}
		
		protected function hashData($data){
			return hash_hmac('sha512',$data, $this->_siteKey);
		}
	}

?>

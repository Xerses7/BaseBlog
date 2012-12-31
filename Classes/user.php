<?php

	class User{
		protected $conn = '';
		private $e_mail = '';
		protected $password = '';
		private $data_inserimento = '';
		private $user_salt = '';
		private $is_verified = '';
		private $is_admin = '';
		private $is_active = '';
		private $verification_code = '';
		
		public function __construct ($username, $password) {
			$this->conn = new Database();
			$data = $this->conn->select('utenti AS u', 
										"WHERE u.e_mail = :username AND u.password = :password",
										'',
										'LIMIT 1',
										array(':username' => $username,
												':password' => $password));
			
			$this->e_mail = $data['e_mail'];
			$this->password = $data['password'];
			$this->data_inserimento = $data['data_inserimento'];
			$this->user_salt = $data['user_salt'];
			$this->is_verified = $data['is_verified'];
			$this->is_active = $data['is_active'];
			$this->is_admin = $data['is_admin'];
			$this->verification_code = $data['verification_code'];
		}
		
		public function isAdmin(){
			if (isset($this->is_admin)){
				echo "$this->e_mail is an admin !";
				return true;
			} else {
				return false;
			}
		}
		
		public function isActive(){
			if (isset($this->is_active)){
				
				return true;
			} else {
				return false;
			}
		}
		
		public function isVerified(){
			if (isset($this->is_verified)){
				return true;
			} else {
				return false;
			}
		}
		
		//create
		public static function create ($values) {
			$result = $this->conn->insert(
				'id_utente, e_mail, password, data_inserimento, user_salt, is_verified, is_active, is_admin, verification_code',
				':id_utente, :e_mail, :password, :data_inserimento, :user_salt, :is_verified, :is_active, :is_admin, :verification_code',
				$values
			);
			
			if(isset($result)){	
				return true;
			} else {
				return false;
			}
				
		}
		
		//read
		public function read () {
		
		}
		
		//update
		public function update () {
		
		}
		
		//delete
		public function delete () {
		
		}
	}

?>

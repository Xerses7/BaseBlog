<?php

	class User{
		protected $conn = '';
		
		public function __construct () {
			$this->conn = new Database();	
		}
		
		//create
		public static function create ($values) {
			$result = $this->conn->insert(
				'id_utente, e_mail, password, data_inserimento, user_salt, is_verified, is_active, is_admin, verification_code',
				':id_utente, :e_mail, :password, :data_inserimento, :user_salt, :is_verified, :is_active, :is_admin, :verification_code',
				$values
			);
			
			isset($result) ?
				return true :
				return false;
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

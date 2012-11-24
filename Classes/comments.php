<?php

	class Comments {
		//db connection
		protected $conn = '';
		
		public function __construct () {
			$this->conn = new Database();	
		}
		
		//create
		public function create($values) {
			$this->conn->insert(
				'commenti',
				'id_commento, post_id, user, data_ora, testo',
				':id_commento, :post_id, :user, :data_ora, :testo',
				$values
			);
		}
		
		//read
		public function get ($postId) {
			$data = $this->conn->select("commenti", " WHERE post_id = :id ", "ORDER BY data_ora DESC", "", $postId);
			return($data);
		}
		
		//update
		public function update () {
		
		}
		
		//delete
		public function delete () {
		
		}
	}

?>

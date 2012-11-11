<?php
	require_once('connection.php');
	
	class Post {
		//db connection
		protected $conn = '';
		// constructor method
		public function __construct () {
			$this->conn = new Connection();
		}
		
		//new Post
		public function create ($data){
			print_r($data);
			$this->conn->insert(
				"post",
				"id_post, titolo, data_ora, testo, categoria_id",
				":id_post, :titolo, :data_ora, :testo, :categoria_id",
				$data
			);
		}
		
		//update
		public function update (){
			
		}
		
		//delete
		public function delete (){
			
		}
		
		//show 
		public function show () {
			
		}
	}

?>

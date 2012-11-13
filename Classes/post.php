<?php
	
	
	class Post {
		//db connection
		protected $conn = '';
		
		// constructor method
		public function __construct () {
			$this->conn = new Database();
		}
		
		//new Post
		public function create ($values){
			print_r($values);
			$this->conn->insert(
				"post",
				"id_post, titolo, data_ora, testo, categoria_id",
				":id_post, :titolo, :data_ora, :testo, :categoria_id",
				$values
			);
		}
		
		//update
		public function update ( $fields, $params, $values ){
			print_r($values);
			$this->conn->update(
				"post",
				$fields,
				$params,
				$values,
				":id_post",
				"id_post"
			);
		}
		
		//delete
		public function delete (){
			
		}
		
		//show 
		public function show () {
			
		}
		
		//get Post by Id
		public function get ( $id ) {
			$data = select($id, "post");
		}
	}

?>

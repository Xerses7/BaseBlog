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
		public function update ($postId, $fields, $params, $values ){
			$this->conn->update(
				$postId,
				"post",
				$fields,
				$params,
				$values,
				":id_post",
				"id_post"
			);
		}
		
		//delete
		public function delete ($postId){
			$ifDeleted = $this->conn->delete($postId, "post", "id_post");
			return($ifDeleted);
		}
		
		//show 
		public function show () {
			
		}
		
		//get Post by Id
		public function get ( $id ) {
			
			$data = $this->conn->select("post", " WHERE id_post = :id ",'', "LIMIT 1", $id);
			return($data);
		}
		
		
	}

?>

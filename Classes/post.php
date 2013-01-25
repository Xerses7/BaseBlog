<?php
	
	class Post {
		
		//db connection
		protected $conn = '';
		
		// constructor method
		public function __construct () {
			$this->conn = new Database();
		}
		
		//new Post
		public function create ($values, $tags = null ){
			print_r($values);
			
			
			$postId = $this->conn->insert(
				"post",
				"id_post, titolo, data_ora, testo, categoria_id",
				":id_post, :titolo, :data_ora, :testo, :categoria_id",
				$values
			);
			
			
			//echo("Post id: $postId ");
			
			if (isset($tags)){
				$tagString = $tags;
				$tagsContr = new Tags();
				$tagsContr->addToPost($tagString, $postId);
			}
			
			return($postId);
		}
		
		//update
		public function update ($postId, $fields, $params, $values, $newtags = null ){
			$this->conn->update(
				$postId,
				"post",
				$fields,
				$params,
				$values,
				":id_post",
				"id_post"
			);
			
			if(isset($newtags)){
				
				$tagsContr = new Tags();
				$tagsContr->addToPost($newtags, $postId);
			}
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

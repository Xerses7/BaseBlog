<?php

	class Posts {
		protected $db = '';
		
		public function __construct(){
			$this->db = new Database();
		}
		
		// the first posts in reverse order of creation
		public function get (){
			//fetch posts from db
			$posts = $this->db->select
			(
				"post",
				"",
				"ORDER BY id_post DESC",
				"LIMIT 10"
			);
			return($posts);
		}
		
		// an interval of posts
		public function getByCategory ($categoryId) {
			//fetch posts from db
			$posts = $this->db->select
			(
				"post",
				"WHERE id_categoria = :id",
				"ORDER BY id_post DESC",
				"LIMIT 10",
				$categoryId
			);
			return($posts);
		}
	}

?>

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
				""
			);
			return($posts);
		}
		
		// an interval of posts by category
		public function getByCategory ($categoryId) {
			//fetch posts from db
			$posts = $this->db->select
			(
				"post",
				"WHERE categoria_id = :id",
				"ORDER BY id_post DESC",
				"",
				$categoryId
			);
			return($posts);
		}
		
		// an interval of posts by tag
		public function getByTag($tagId){
			//fetch posts from db
			$postsIds = $this->db->select
			(
				"posts_tags",
				"WHERE tag_id = :id",
				"ORDER BY post_id DESC",
				"",
				$tagId,
				"post_id"
			);
			
			$postContr = new Post();
			$posts = array();
			
			foreach ($postsIds as $id){
				$posts[] = $postContr->get($id['post_id']);
			}

			return($posts);
		}
	}

?>

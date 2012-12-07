<?php

	class Tags {
	
		//db connection
		protected $conn = '';
		private $tagsTable = '';
		private $postTagsLinks = '';
		
		public function __construct () {
			$this->conn = new Database();
			$tags = $this->conn->select('tag','');

			$tt = array();
			foreach($tags as $tag){	
				$tt[$tag['id_tag']] = $tag['nome_tag'];
			}
			$this->tagsTable = $tt;
			print_r($this->tagsTable);
		}
		
		//adds tags to post...
		public function addToPost ($tagString, $idPost = null) {
			
			echo("Add to post: $idPost");
			
			$tagsInserted = array();
			
			// tag list, inserted as a form string, changed to array
			// tags have to be separated with comma+space => ", "
			$tagsInserted = explode(", ", $tagString);
			
			if (!isset($idPost)){
				$idPost = "";
			}
			$linkTags = $this->conn->select('posts_tags LEFT JOIN (tag) ON (posts_tags.tag_id)', 'WHERE posts_tags.post_id = :id', '','', $idPost, 'tag.*');
			print_r($linkTags);
			
			// for each element of the array 
			foreach($tagsInserted as $tag){
				// check if the tag is in the db
				if ($this->exists($tag)){
				
					// if in db get the tag id and change it to integer...
					$idTag = (int)array_search($tag, $this->tagsTable);
					
					// ... check if post link already exists...
					if(!isset($linkTags[$idTag])){
						// and if not, add the link
						$this->linkPost($idPost, $idTag);
					}
					
				} else {
					// if the tag is NOT in db add tag to tags table...
					$idTag = $this->add($tag);
					//... and create tag-post link
					$this->linkPost($idPost, $idTag);
				}
				
			}

		}
		
		//read
		public function read () {
			$linkTags = $this->conn->select('posts_tags LEFT JOIN (tag) ON (posts_tags.tag_id)', 'WHERE posts_tags.post_id = :id', '','', $idPost, 'tag.*');
			print_r($linkTags);
		}
		
		//update
		public function update () {
		
		}
		
		//delete
		public function delete () {
		
		}
		
		// get all tags present in tags table
		private function getTags(){
			$tags = $this->conn->select('tag','');
			return($tags);
		}
		
		// add tag to tag table
		private function add ($value) {
			$id = $this->conn->insert(
								'tag',
								'id_tag, nome_tag',
								':id_tag, :nome_tag',
								array(':id_tag' => null, ':nome_tag' => $value)
								);
	
			// return the last inserted tag id
			return($id);
		}
		
		// add tag link to post table 
		private function linkPost ($idPost, $idTag){
			$this->conn->insert(
									'posts_tags',
									'id_posttag, tag_id, post_id',
									':id_posttag, :tag_id, :post_id',
									array(':id_posttag' => null,':tag_id' => $idTag, ':post_id' => $idPost)
			);
			return(true);
		}
		
		private function exists ($value) {
			if (isset($this->tagsTable)){
				if (in_array($value, $this->tagsTable)){
					return(true);
				} else {
					return(false);
				}
			} else {
				return(false);
			}
		}
		
		private function isLinkedToPost ($tag, $post){
			// check if the link table exists
			if(isset($this->postTagsLinks)){
				// get the tag ID
				$tagId = array_search($tag, $this->tagsTable);
				// check 
				if (in_ar){
				
				}
			}
		}
	}

?>

<?php

	class Tags {
	
		//db connection
		protected $conn = '';
		private $tagsTable = '';
		
		public function __construct () {
			$this->conn = new Database();
			$tags = $this->conn->select('tag','');

			$tt = array();
			foreach($tags as $tag){	
				$tt[$tag['id_tag']] = $tag['nome_tag'];
			}
			$this->tagsTable = $tt;
		}
		
		//adds tags to post...
		public function addToPost ($tagString, $idPost = null) {
			$tagsInserted = array();
			
			// tag list, inserted as a form string, changed to array
			// tags have to be separated with comma+space => ", "
			$tagsInserted = explode(", ", $tagString);
			
			if (!isset($idPost)){
				$idPost = "";
			}
			
			$tagsToDelete = array();
			
			$postTags = $this->getPostTags($idPost);
			
			// DELETING TAGS REMOVED FROM FORM
			// for each tag linked to the post 
			foreach($postTags as $key => $oldTag){
				// check if the tag wasn't reinserted
				if(!in_array( $oldTag, $tagsInserted )){
					// if not, add it to the tags to delete from post
					$tagsToDelete[$key] = $oldTag;
				}
			}
			// let's delete the removed tags
			foreach($tagsToDelete as $key => $tag){
				$this->delete($key, $idPost);
			}
			
			// INSERTING NEW TAGS								
			// for each element of the array 
			foreach($tagsInserted as $tag){
				
				// check if the tag is in the db
				if ($this->exists($tag)){
					// get the tag id and change it to integer...
					$idTag = (int)array_search($tag, $this->tagsTable);
						
					//echo("Il tag con id $idTag esiste già. ");
					// ... check if post link already exists...
					if(!isset($postTags[$idTag])){
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
		public function get ($idPost) {
			$postTags = $this->getPostTags($idPost);
			
			return($postTags);
			// TODO inserting the tag ID to link to a tag only page in the view
		}
		
		public function getTagString($idPost){
			$stringTags = '';
			$elemNum = 0;
			
			$postTags = $this->getPostTags($idPost);
			
			foreach($postTags as $tag){
				$elemNum++;
				if($elemNum === count($postTags)){
					$stringTags = $stringTags.$tag;
				} else {
					$stringTags = $stringTags.$tag.", ";
				}
				
			}
			
			return($stringTags);
		}
		
		//update
		public function update () {
		
		}
		
		//delete
		public function delete ($idTag, $idPost) {
			$toDelete = $this->conn->select('posts_tags', 
										"WHERE tag_id = :tag_id AND post_id = :post_id",
										"",
										"",
										array(":tag_id" => $idTag, ":post_id" => $idPost));
			$tag = current($toDelete);
			
			$this->conn->delete($tag['id_posttag'],'posts_tags', 'id_posttag');
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
		
		private function getPostTags($idPost){
			$postTags = array();
			$tags = $this->conn->select('posts_tags INNER JOIN (tag) ON (posts_tags.tag_id)', 
													'WHERE tag.id_tag = posts_tags.tag_id AND posts_tags.post_id = :id', 
													'',
													'',
													$idPost,
													'tag.*');
			foreach($tags as $tag){
				$postTags[(int)$tag['id_tag']] = $tag['nome_tag'];
			}
			
			return ($postTags);
		}
	}

?>

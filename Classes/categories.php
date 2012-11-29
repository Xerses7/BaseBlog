<?php

	class Categories {
	
		//db connection
		protected $conn = '';
		
		public function __construct () {
			$this->conn = new Database();	
		}
		
		//create
		public function create () {
			
		}
		
		//read
		public function get () {
			$categories = $this->conn->select("categorie",""," ORDER BY nome_categoria");
			return($categories);
		}
		
		public function getNameById ($categoryId){
			$category = $this->conn->select("categorie", "WHERE id_categoria = :id", "", "", $categoryId);
			$category = $category[0];
			return($category['nome_categoria']);
		}
		
	}

?>

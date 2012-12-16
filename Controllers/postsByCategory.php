<?php
	require("../Classes/classes.php");
	
	$data = array();
	
	if (isset($_GET['id_categoria'])){
		$id_categoria = $_GET['id_categoria'];
		$postsContr = new Posts();
		$tagsContr = new Tags();
		$oldPosts = $postsContr->getByCategory($id_categoria);
		
		$posts = array();
		
		foreach($oldPosts as $post){
			//converting date format from MySQL datetime to view display
			$post['data_ora'] = Date::get( $post['data_ora'] );
			$post['testo'] = nl2br( $post['testo'] );
			$post['tags'] = $tagsContr->get((int)$post['id_post']);
			
			$posts[] = $post;
		}
		
		$data['posts'] = $posts;
		
		//get all categories
		$categoriesContr = new Categories();
		$categories = $categoriesContr->get();
		$categoryName = $categoriesContr->getNameById($id_categoria);
		
		$data['nome_categoria'] = $categoryName;
		$data['categories'] = $categories;
		
	} else {
		header("Location: http://localhost/Blog");
	}
	
	View::get("postsByCategory", $data);
?>

<?php
	require("../Classes/classes.php");
	
	$data = array();
	
	if (isset($_GET['id_categoria'])){
		$id_categoria = $_GET['id_categoria'];
		$postsContr = new Posts();
		$oldPosts = $postsContr->getByCategory($id_categoria);
		
		$posts = array();
		
		foreach($oldPosts as $post){
			//converting date format from MySQL datetime to PHP timestamp
			$post['data_ora'] = Date::mySQLToPHP( $post['data_ora'] );
			$post['testo'] = nl2br( $post['testo'] );
			$posts[] = $post;
		}
		
		$data['posts'] = $posts;
		
		//get all categories
		$categoriesContr = new Categories();
		$categories = $categoriesContr->get();
		
		$data['categories'] = $categories;
		
	} else {
		header("Location: http://localhost/Blog");
	}
	
	View::get("postsByCategory", $data);
?>

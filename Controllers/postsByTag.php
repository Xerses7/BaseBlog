<?php
	require("../Classes/classes.php");
	
	session_start();
	
	$data = array();
	
	if (isset($_GET['id_tag'])){
		$id_tag = $_GET['id_tag'];
		$postsContr = new Posts();
		$tagsContr = new Tags();
		$oldPosts = $postsContr->getByTag($id_tag);
		
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
		$data['categories'] = $categories;
		
		//get the selected tag's name
		$data['tag_name'] = $tagsContr->getName($id_tag);
		
		//check if user is admin
		if (isset($_SESSION['admin'])){
			$data['canDisplay'] = true;
		} else {
			$data['canDisplay'] = false;
		}
	} else {
		header("Location: http://localhost/Blog");
	}
	
	View::get("postsByTag", $data);
	
?>

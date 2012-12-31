<?php
	require("../Classes/classes.php");
	
	session_start();
	
	$data = array();
	if (isset($_GET['id_post'])){
		$idPost = $_GET['id_post'];
		$postContr = new Post();
		$post = $postContr->get($idPost);
		
		//insert newlines and carriage returns in text
		$post['testo'] = nl2br($post['testo']);
		
		//converting date format from MySQL datetime to view display
		$post['data_ora'] = Date::get( $post['data_ora'] );
		
		//get all comments on the post
		$commentsContr = new Comments();
		$comments = $commentsContr->get($idPost);
		$post['comments'] = $comments;
		
		//get all categories
		$categoriesContr = new Categories();
		$categories = $categoriesContr->get();
		$post['categories'] = $categories;
		
		if (isset($_SESSION['admin'])){
			$post['canDisplay'] = true;
		} else {
			$post['canDisplay'] = false;
		}
		
		$data = $post;
		
	} else {
		header("Location: http://localhost/Blog");
	}
	
	View::get("showPost", $data);
?>

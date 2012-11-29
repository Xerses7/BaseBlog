<?php
	require("../Classes/classes.php");
	
	$data = array();
	if (isset($_GET['id_post'])){
		$idPost = $_GET['id_post'];
		$postContr = new Post();
		$data = $postContr->get($idPost);
		
		//insert newlines and carriage returns in text
		$data['testo'] = nl2br($data['testo']);
		
		//get date and hour to the right php timestamp
		$data['data_ora'] = Date::mySQLToPHP( $data['data_ora'] );
		
		//get all comments on the post
		$commentsContr = new Comments();
		$comments = $commentsContr->get($idPost);
		$data['comments'] = $comments;
		
		//get all categories
		$categoriesContr = new Categories();
		$categories = $categoriesContr->get();
		$data['categories'] = $categories;
		
	} else {
		header("Location: http://localhost/Blog");
	}
	
	View::get("showPost", $data);
?>

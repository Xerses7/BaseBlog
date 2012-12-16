<?php
	require("./Classes/classes.php");
	
	$postsContr = new Posts();
	$tagsContr = new Tags();
	
	$oldposts = $postsContr->get();
	$posts = array();
	
	foreach($oldposts as $post){
		//converting date format from MySQL datetime to view display
		$post['data_ora'] = Date::get( $post['data_ora'] );
		$post['testo'] = nl2br( $post['testo'] );
		
		$post['tags'] = $tagsContr->get((int)$post['id_post']);
		$posts[] = $post;
	}
	
	//get all categories
	$categoriesContr = new Categories();
	$categories = $categoriesContr->get();
	
	View::get( "index", array( 'posts' => $posts, 'categories' => $categories ) );

?>

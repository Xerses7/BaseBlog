<?php
	require("./Classes/classes.php");
	
	$postsContr = new Posts();
	$tagsContr = new Tags();
	
	$oldposts = $postsContr->get();
	$posts = array();
	
	foreach($oldposts as $post){
		//converting date format from MySQL datetime to PHP timestamp
		$post['data_ora'] = Date::mySQLToPHP( $post['data_ora'] );
		$post['testo'] = nl2br( $post['testo'] );
		
		$post['tags'] = $tagsContr->get((int)$post['id_post']);
		$posts[] = $post;
	}
	
	//get all categories
	$categoriesContr = new Categories();
	$categories = $categoriesContr->get();
	
	View::get( "index", array( 'posts' => $posts, 'categories' => $categories ) );

?>

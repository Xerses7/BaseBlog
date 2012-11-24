<?php
	require("./Classes/classes.php");
	
	$postsContr = new Posts();
	
	$oldposts = $postsContr->get();
	$posts = array();
	
	foreach($oldposts as $post){
		$post['data_ora'] = Date::mySQLToPHP( $post['data_ora'] );
		$post['testo'] = nl2br( $post['testo'] );
		$posts[] = $post;
	}
	
	View::get("index", array(
		'posts' => $posts
	));

?>

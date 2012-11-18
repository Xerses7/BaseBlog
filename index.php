<?php
	require("./Classes/classes.php");
	
	$postsContr = new Posts();
	
	$posts = $postsContr->get();
	
	View::get("index", array(
		'posts' => $posts
	));

?>

<?php
	require("./Classes/classes.php");
	
	session_start();
	
	$canDisplay = false;
	if (isset($_SESSION['admin'])){
		$canDisplay = true;
	}
	
	$postsContr = new Posts();
	$tagsContr = new Tags();
	$categoriesContr = new Categories();
	$oldposts = $postsContr->get();
	$posts = array();
	
	foreach($oldposts as $post){
		//converting date format from MySQL datetime to view display
		$post['data_ora'] = Date::get( $post['data_ora'] );
		$post['testo'] = nl2br( $post['testo'] );
		
		$post['tags'] = $tagsContr->get((int)$post['id_post']);
		$post['categoria'] = $categoriesContr->getNameById($post['categoria_id']);
		$posts[] = $post;
	}
	
	//get all categories
	
	$categories = $categoriesContr->get();
	
	// pagination : all the posts, total number of posts, posts per page
	$page = new Page($posts, count($posts), 10);
	if (isset($_GET['pn'])){
		// select the page number chosen in the querystring
		$page->select($_GET['pn']);
	} else {
		// or select the first
		$page->select();
	}
	
	View::get( "index", array( 'posts' => $page->toPresent(),
										'pageNumbers' => $page->numbers("index.php"),
										'categories' => $categories, 
										'canDisplay' => $canDisplay ) );

?>

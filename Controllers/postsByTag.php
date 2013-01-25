<?php
	require("../Classes/classes.php");
	
	session_start();
	
	$data = array();
	
	if (isset($_GET['id_tag'])){
		$id_tag = $_GET['id_tag'];
		$postsContr = new Posts();
		$tagsContr = new Tags();
		$categoriesContr = new Categories();
		
		$oldPosts = $postsContr->getByTag($id_tag);
		
		$posts = array();
		
		foreach($oldPosts as $post){
			//converting date format from MySQL datetime to view display
			$post['data_ora'] = Date::get( $post['data_ora'] );
			$post['testo'] = nl2br( $post['testo'] );
			$post['tags'] = $tagsContr->get((int)$post['id_post']);
			
			$posts[] = $post;
		}

		//get all categories
		$categories = $categoriesContr->get();
		
		//check if user is admin
		if (isset($_SESSION['admin'])){
			$data['canDisplay'] = true;
		} else {
			$data['canDisplay'] = false;
		}
		
		// pagination
		// first we get the querystring: the page address MUST contain references to the tag ID, if present
		$queryString = $_SERVER['QUERY_STRING'];
		$page = new Page($posts, count($posts), 5);
		if (isset($_GET['pn'])){
			// select the page number chosen in the querystring
			$page->select($_GET['pn']);
		} else {
			// or select the first
			$page->select();
		}
		
		//assign to data array
		$data['posts'] = $page->toPresent();
		$data['pageNumbers'] = $page->numbers("postsByTag.php", $queryString);
		$data['categories'] = $categories;
		
		//get the selected tag's name
		$data['tag_name'] = $tagsContr->getName($id_tag);
	} else {
		header("Location: http://".$_SERVER['HTTP_HOST']);
	}
	
	View::get("postsByTag", $data);
	
?>

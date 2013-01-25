<?php
	require("../Classes/classes.php");
	
	session_start();
	
	$data = array();
	
	if (isset($_GET['id_categoria'])){
		$id_categoria = $_GET['id_categoria'];
		$postsContr = new Posts();
		$tagsContr = new Tags();
		$oldPosts = $postsContr->getByCategory($id_categoria);
		
		$posts = array();
		
		foreach($oldPosts as $post){
			//converting date format from MySQL datetime to view display
			$post['data_ora'] = Date::get( $post['data_ora'] );
			$post['testo'] = nl2br( $post['testo'] );
			$post['tags'] = $tagsContr->get((int)$post['id_post']);
			
			$posts[] = $post;
		}
		
		//get all categories
		$categoriesContr = new Categories();
		$categories = $categoriesContr->get();
		$categoryName = $categoriesContr->getNameById($id_categoria);
		
		//check if user is admin
		if (isset($_SESSION['admin'])){
			$data['canDisplay'] = true;
		} else {
			$data['canDisplay'] = false;
		}
		
		// pagination
		// first we get the querystring: the page address MUST contain references to the category ID
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
		$data['pageNumbers'] = $page->numbers("postsByCategory.php", $queryString);
		$data['nome_categoria'] = $categoryName;
		$data['categories'] = $categories;
		
		View::get("postsByCategory", $data);
		
	} else {
		header("Location: http://".$_SERVER['HTTP_HOST']);
	}
	
	
?>

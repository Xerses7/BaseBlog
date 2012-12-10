<?php
	require("../Classes/classes.php");
	
	$data = array();
	
	// AFTER the Update...
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		echo("Tentativo di inserimento...");
		if (empty($_POST['titolo']) || empty($_POST['testo'])){
			$data['status'] = "Riempire entrambi i form per favore !";
		} else {
			$tagsContr = new Tags();
			
			// get data from server
			$title = $_POST['titolo'];
			$text = $_POST['testo'];
			$id = $_POST['id_post'];
			$idCategory = $_POST['categories'];
			
			// get tags from update form
			$tagString = $_POST['tags'];
			
			$post = new Post();
			$fields = array('titolo', 'testo', 'categoria_id');
			$params = array(':titolo', ':testo', ':categoria_id');
			$values = array(':titolo' => $title,':testo' => $text, ':categoria_id' => $idCategory);
			$post->update($id, $fields, $params, $values,$tagString);
			
			header("Location: http://localhost/Blog");
		}
	// BEFORE the Update...
	} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$idPost = $_GET['id_post']; 
		
		$post = new Post();
		$tagsContr = new Tags();
		
		//get all categories
		$categoriesContr = new Categories();
		$categories = $categoriesContr->get();
		$data['categories'] = $categories;
		
		// get tags string
		$data['tagString'] = $tagsContr->getTagString($idPost);
		
		//get post to update from querystring
		$data['post'] = $post->get($idPost);
	} 
	
	
	View::get("updatePost", $data);
	
?>

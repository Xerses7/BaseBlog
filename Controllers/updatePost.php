<?php
	require("../Classes/classes.php");
	
	$data = array();
	
	// AFTER the Update...
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		echo("Tentativo di inserimento...");
		if (empty($_POST['titolo']) || empty($_POST['testo'])){
			$data['status'] = "Riempire entrambi i form per favore !";
		} else {
		
			// get data from server
			$title = $_POST['titolo'];
			$text = $_POST['testo'];
			$id = $_POST['id_post'];
			$post = new Post();
			$fields = array('titolo', 'testo');
			$params = array(':titolo', ':testo');
			$values = array(':titolo' => $title,':testo' => $text);
			$post->update($id, $fields, $params, $values);
			
			header("Location: http://localhost/Blog");
		}
	// BEFORE the Update...
	} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$post = new Post();
		
		//TODO
		//get post to update from querystring
		$data = $post->get($_GET['id_post']);
	} 
	
	
	
	View::get("updatePost", $data);
	
?>

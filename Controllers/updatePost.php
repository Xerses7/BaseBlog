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
			
			$data['status'] = "Post Inserito";
		}
	// BEFORE the Update...
	} else {
		$post = new Post();
		//TODO
		//get post to update from querystring
		$data = $post->get(1);
	} 
	
	
	
	View::get("updatePost", $data);
	
?>

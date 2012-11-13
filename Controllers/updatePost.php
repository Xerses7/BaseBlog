<?php
	require("../Classes/classes.php");
	
	$data = array();
	
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		echo("Tentativo di inserimento...");
		if (empty($_POST['titolo']) || empty($_POST['testo'])){
			$data['status'] = "Riempire entrambi i form per favore !";
		} else {
			// get data from server
			
			$data['status'] = "Post Inserito";
		}
	} else {
		$post = new Post();
		$data = $post->get(1);
	} 
	
	
	
	View::get("updatePost", $data);
	
?>

<?php
	require("../Classes/classes.php");
	
	$data = array();
	if (isset($_GET['id_post'])){
		$idPost = $_GET['id_post'];
		$postContr = new Post();
		$data = $postContr->get($idPost);
		
		//insert newlines and carriage returns in text
		$data['testo'] = nl2br($data['testo']);
	} else {
		header("Location: http://localhost/Blog");
	}
	
	View::get("showPost", $data);
?>

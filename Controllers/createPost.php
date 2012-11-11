<?php
	require("../Classes/classes.php");
	
	$data = array();
	
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		echo("Tentativo di inserimento...");
		if (empty($_POST['titolo']) || empty($_POST['testo'])){
			$data['status'] = "Riempire entrambi i form per favore !";
		} else {
			// get data from server
			$data[':id_post'] = " ";
			$data[':titolo'] = $_POST['titolo'];
			$data[':testo'] = $_POST['testo'];
			//TODO
			$data[':data_ora'] = "12";
			$data[':categoria_id'] = "1";
			//$utente[':utente_id']
			
			// inserire il post nel DB
			$dbPost = new Post();
			$dbPost->create($data);
			$data['status'] = "Post Inserito";
		}
	} 
	
	View::get("createPost", $data);
	
?>

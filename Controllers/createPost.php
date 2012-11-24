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
			 
			$data[':data_ora'] = Date::phpToMySQL( time() );
			$data[':categoria_id'] = "1";
			//$utente[':utente_id']
			
			// inserire il post nel DB
			$dbPost = new Post();
			$dbPost->create($data);
			unset($data);
			header("Location: http://localhost/Blog");
		}
	} 
	
	
	
	View::get("createPost", $data);
	
?>

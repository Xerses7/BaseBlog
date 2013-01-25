<?php
	require("../Classes/classes.php");
	
	session_start();
	
	if(isset($_POST["username"]) && isset($_POST["password"])){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		
		$user = new User($username, $password);
		if ($user->isAdmin()){
		
			$_SESSION['admin'] = true;
			header("Location: http://".$_SERVER['HTTP_HOST']);
		} else {
			echo("Dati errati, accesso vietato!");
		}
	} else {
		echo("Per favore riempire entrambi i campi!");
	} 

?>

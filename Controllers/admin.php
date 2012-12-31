<?php
	require("../Classes/classes.php");
	
	session_start();
	
	if(isset($_POST["username"]) && isset($_POST["password"])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$user = new User($username, $password);
		if ($user->isAdmin()){
		
			$_SESSION['admin'] = true;
		}
	} else {
	
	} 

?>

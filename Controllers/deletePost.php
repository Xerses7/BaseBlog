<?php
	require("../Classes/classes.php");
	
	if(isset($_GET['id_post'])){
		$postId = $_GET['id_post'];
		$postsContr = new Post();
		$deleted = $postsContr->delete($postId);
		if($deleted){
			header("Location: http://".$_SERVER['HTTP_HOST']);
		}
	}
?>

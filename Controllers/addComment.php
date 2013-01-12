<?php
	require("../Classes/classes.php");
	
	if( isset( $_GET['textComment'] ) ){
		if(empty($_GET['user'])|empty($_GET['textComment'])){
			echo "Per favore riempire entrambi i campi!";
		}
		else {
			$data = array();
			$postId = $_GET['post_id'];
		
			$com = new Comments();
		
			$data[':id_commento'] = " ";
			$data[':post_id'] = $postId;
			$data[':user'] = htmlspecialchars($_GET['user']);
			$data[':testo'] = htmlspecialchars($_GET['textComment']);
			$data[':data_ora'] = Date::phpToMySQL( time() );
		
			$com->create($data);
			header("Location: http://localhost/Blog/Controllers/showPost.php?id_post=$postId");
		}
	}

?>

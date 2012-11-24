<?php
	require("../Classes/classes.php");
	
	if( isset( $_GET['textComment'] ) ){
		$data = array();
		$postId = $_GET['post_id'];
		
		$com = new Comments();
		
		$data[':id_commento'] = " ";
		$data[':post_id'] = $postId;
		$data[':user'] = $_GET['user'];
		$data[':testo'] = $_GET['textComment'];
		$data[':data_ora'] = Date::phpToMySQL( time() );
		
		$com->create($data);
		header("Location: http://localhost/Blog/Controllers/showPost.php?id_post=$postId");
	}

?>

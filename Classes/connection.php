<?php

	class Connection {
		public function __construct(){
			try{
				$conn = new PDO('mysql:host=localhost',"dbname=$database", $username,$password );
				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}
	}

?>

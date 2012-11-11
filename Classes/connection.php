<?php
	
	class Connection {
		protected $dbconn = '';
		
		public function __construct(){
			include("config.php");
			try{
				$conn = new PDO("mysql:host=localhost;dbname=$database", $username,$password );
				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this->dbconn = $conn;
			} catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}
		
		public function insert ($table,$fields,$params,$values){
			try {
				echo("INSERT INTO $table($fields) VALUES($params)");
				$stmt = $this->dbconn->prepare("INSERT INTO $table($fields) VALUES($params)");
				print_r($values);
				$result = $stmt->execute($values);
			} catch (PDOException $e){
				echo "Error: " . $e->getMessage();
			} 
		}
	}

?>

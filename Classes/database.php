<?php
	
	class Database {
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
				//echo("INSERT INTO $table($fields) VALUES($params)");
				$stmt = $this->dbconn->prepare("INSERT INTO $table($fields) VALUES($params)");
				print_r($values);
				$result = $stmt->execute($values);
			} catch (PDOException $e){
				echo "Error: " . $e->getMessage();
			} 
		}
		
		public function update ( $table, $fields, $params, $values, $idParam, $tableId ) {
			//$table is a string
			
			//$fields, $params and $values can change in length, and have to be arrays
			if (!is_array( $fields ) || !is_array( $params ) || !is_array( $values )){
				echo "Arrays have to be used as parameters, or fields, or values";
			}
			
			try {
				//the first part of the query is fixed
				$query = "UPDATE $table SET ";
				
				//then I count the number of $fields
				$numberOfFields = length($fields);
				
				//cycle over the $fields and $params
				for ($x = 0; $x < $numberOfFields; $x++){
					// sum the fields and params data
					$query .= "$fields[$x] = $params[$x] ";
				}
				
				// add WHERE clause with id info
				$query .= "WHERE $tableId = $idParam";
				
				// a little debug..
				print($query);

				$stmt = $this->dbconn->prepare($query);
				
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
		}
		
		public function select ($table, $where, $details = '', $limit = '', $id =''){
			try {
				$query = "SELECT * FROM $table $where $details $limit";
				// for debug..
				// print ($query);
				$stmt = $this->dbconn->prepare($query);
				
				$result;
				
				// checking if the query is on a single post
				if ( $id ){
					$result = $stmt->execute( array(':id' => $id) );
				} else {
					$result = $stmt->execute();
				}
				
				// more, choosing if we have to fetch 1 or more rows 
				if ($limit === "LIMIT 1"){
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
				} else {
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				
				return($result);
				
			} catch (PDOException $e){
				echo "Error: " . $e->getMessage();
			} 
		}
	}

?>

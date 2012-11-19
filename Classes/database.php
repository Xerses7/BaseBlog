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
		
		public function update ( $id, $table, $fields, $params, $values, $idParam, $tableId ) {
			//$table is a string
			
			//$fields, $params and $values can change in length, and have to be arrays
			if (!is_array( $fields ) || !is_array( $params ) || !is_array( $values )){
				echo "Parameters, or fields, or values have to be used as arrays!";
			}
			
			try {
				//the first part of the query is fixed
				$query = "UPDATE $table SET ";
				
				//then I count the number of $fields
				$numberOfFields = count($fields);
				
				echo ("Numero di elementi nell'array : " . $numberOfFields);
				//cycle over the $fields and $params
				for ($x = $numberOfFields; $x > 0 ; $x--){
					// sum the fields and params data
					if ($x === 1){
						$y = $x-1;
						echo($y);
						$query .= "$fields[$y] = $params[$y]";
					} else {
						$y = $x-1;
						echo($y);
						$query .= "$fields[$y] = $params[$y],";
					}	
				}
				
				// add WHERE clause with id info
				$query .= " WHERE $tableId = $idParam";
				
				//adding post_id to values to bind in execution
				$values[$idParam] = $id;
				print_r($values);
				
				// a little debug..
				print($query);

				$stmt = $this->dbconn->prepare($query);
				$result = $stmt->execute($values);
				return($result);
				
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
		}
		
		public function select ($table, $where, $details = '', $limit = '', $id =''){
			try {
				$query = "SELECT * FROM $table $where $details $limit";
				// for debug..
				//print ($query);
				$stmt = $this->dbconn->prepare( $query );
				
				$result;
				
				// checking if the query is on a single post
				if ( $id ) {
					$result = $stmt->execute( array( ':id' => $id ) );
				} else {
					$result = $stmt->execute();
				}
				
				// more, choosing if we have to fetch 1 or more rows 
				if ( $limit === "LIMIT 1" ){
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
				} else {
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				
				return( $result );
				
			} catch ( PDOException $e ){
				echo "Error: " . $e->getMessage();
			} 
		}
	}

?>

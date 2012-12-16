<?php

	class Date {
		public static function mySQLtoPHP ( $datetime ) {
			date_default_timezone_set("Europe/Rome");
			$phpdate = strtotime( $datetime );
			return( $phpdate );
		}
		
		public static function phpToMySQL ( $phpdate ) {
			date_default_timezone_set("Europe/Rome");
			$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
			return ( $mysqldate );
		}
		
		public static function get ($mysqldate){
			$phpdate = self::mySQLtoPHP($mysqldate);
			$viewdate = "inserito il ";
			$viewdate .= date("d/m/Y ", $phpdate);
			$viewdate .= ("alle ");
			$viewdate .= date("H:i:s", $phpdate);
			return ($viewdate);
		}
		
	}

?>

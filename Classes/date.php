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
		
	}

?>

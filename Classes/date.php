<?php

	class Date {
		public static function mySQLtoPHP ( $datetime ) {
			$phpdate = strtotime( $mysqldate );
			return( $phpdate );
		}
		
		public static function phpToMySQL ( $phpdate ) {
			$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
			return ( $mysqldate );
		}
	}

?>

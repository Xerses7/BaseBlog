<?php

	class View {
		public static function get ($path, $data = null){
			
			if ($data) {
				extract($data);
			}
			include("../View/{$path}.view.php");
			
		}
	}

?>

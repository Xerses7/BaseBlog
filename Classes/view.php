<?php

	class View {
		public static function get ($path, $data = null){
			if ($data) {
				extract($data);
			}
			if ($path == "index"){
				$path = $path . ".view.php";
				$style = "./Stile/stile.css";
				$categoryContr = "./Controllers/postsByCategory.php";
				include("./View/layout.php");
			} else {
				$path = $path . ".view.php";
				$style = "../Stile/stile.css";
				$categoryContr = "../Controllers/postsByCategory.php";
				include("../View/layout.php");
			}
		}
	}

?>

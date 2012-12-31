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
				$home = "./index.php";
				$login = "./View/login.view.php";
				include("./View/layout.php");
			} else {
				$path = $path . ".view.php";
				$style = "../Stile/stile.css";
				$categoryContr = "../Controllers/postsByCategory.php";
				$home = "../index.php";
				$login = "../View/login.view.php";
				include("../View/layout.php");
			}
		}
	}

?>

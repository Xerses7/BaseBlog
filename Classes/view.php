<?php

	class View {
		public static function get ($path, $data = null){
			if ($data) {
				extract($data);
			}
			if ($path == "index"){
				$path = $path . ".view.php";
				$style = "./Stile/";
				$highlight = "./Stile/highlight.js/";
				$categoryContr = "./Controllers/postsByCategory.php";
				$tagsContr = "./Controllers/postsByTag.php";
				$home = "./index.php";
				$login = "./View/login.view.php";
				$js = "./Js/";
				include("./View/layout.php");
			} else {
				$path = $path . ".view.php";
				$style = "../Stile/";
				$highlight = "../Stile/highlight.js/";
				$categoryContr = "../Controllers/postsByCategory.php";
				$tagsContr = "../Controllers/postsByTag.php";
				$home = "../index.php";
				$login = "../View/login.view.php";
				$js = "../Js/";
				include("../View/layout.php");
			}
		}
	}

?>

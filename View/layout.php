<!DOCTYPE html> 
<html>
<head>
	<title>Dario Pirola - BLOG</title>
	<meta charset="utf-8">
	<meta name="description" content="The head tag contains the title and meta tags - important to the search engines, and information for the browser to properly display the page.">
	<link rel=stylesheet type=txt/css href="<?php echo($style); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="wrapper">
	<div class="header">
	<h1><a href="<?php echo($home); ?>">Dario Pirola</a></h1>
		<div class="categories">
			<ul>
				<?php foreach($categories as $category) : ?>
					<li><a href="<?php echo($categoryContr); ?>?id_categoria=<?php echo($category['id_categoria']); ?>"><?php echo($category['nome_categoria']); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="content">
		<?php
	
			include($path);
	
		?>
	</div>
	<div class="sidebar">
	</div>
</div>
</body>
</html>

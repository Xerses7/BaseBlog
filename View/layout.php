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
		<div class="login"><a href="<?php echo $login; ?>">Login</a> or register</div>
		<div class="categories">
			<ul>
				<?php foreach($categories as $key => $category) : ?>
					<li><a href="<?php echo($categoryContr); ?>?id_categoria=<?php echo($key); ?>"><?php echo($category); ?></a></li>
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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37750094-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>

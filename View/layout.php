<!DOCTYPE html> 
<html>
<head>
	<title>Dario Pirola - BLOG</title>
	<meta charset="utf-8">
	<meta name="description" content="The head tag contains the title and meta tags - important to the search engines, and information for the browser to properly display the page.">
	
	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo($highlight.'styles/github.css'); ?>" />
	
    <link rel="stylesheet" type="txt/css" href="<?php echo($style.'stile.css'); ?>" />
    <link rel="stylesheet" type="txt/css" href="<?php echo($style.'jMenu.jquery.css'); ?>" />
    
    <script type="text/javascript" src="<?php echo($js.'jquery-2.0.3.js')?>"></script>
    <script type="text/javascript" src="<?php echo($js.'jquery-ui.js')?>"></script>
    <script type="text/javascript" src="<?php echo($js.'jMenu.jquery.js')?>"></script>
    
	<script src="<?php echo($highlight.'highlight.pack.js'); ?>"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body>
<div class="wrapper">
    
	<div class="header">
	    <ul id="jMenu">
	        <li class="fNiv"><a>Temi</a>
	            <ul>
	                <?php foreach($categories as $key => $category) : ?>
		            <li><a href="<?php echo($categoryContr); ?>?id_categoria=<?php echo($key); ?>"><?php echo($category); ?></a></li>
	    	        <?php endforeach; ?>
	            </ul>
	        </li>
	        <li class="fNiv"><a>Chi sono</a></li>
	        <li class="fNiv"><a>Blog</a></li>
	        <li class="fNiv"><a>Twitter</a></li>
		</ul>
	
	<h1><a href="<?php echo($home); ?>">Dario Pirola</a></h1>
		<div class="login"><a href="<?php echo $login; ?>">Login</a> or register</div>
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
<script type="text/javascript">
  $(document).ready(function(){
    // simple jMenu plugin called
    $("#jMenu").jMenu();
 
    // more complex jMenu plugin called
    $("#jMenu").jMenu({
      ulWidth : 'auto',
      effects : {
        effectSpeedOpen : 300,
        effectTypeClose : 'slide'
      },
      animatedText : false
    });
  });
</script>
<script>
    $(function(){
        $tag = $('ul.tags li a');
        $tag.mouseenter(function(){
            $(this).fadeTo('slow', 0.75);
        });
        $tag.mouseleave(function(){
            $(this).fadeTo('slow', 1.00);
        });
    });
</script>
</body>
</html>

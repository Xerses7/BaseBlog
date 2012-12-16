<h2 class="category">Categoria: <?php echo($nome_categoria); ?></h2>


<?php foreach ($posts as $post) : ?>
	<h2 class="title"><a href="../Controllers/showPost.php?id_post=<?php echo $post['id_post']; ?>"><?php echo $post['titolo']; ?></a></h2>
	<ul class="tags">
		<?php foreach ($post['tags'] as $tag) : ?>
			<li><?php echo("$tag "); ?></li>
		<?php endforeach; ?>
	</ul>
	
	<ul class="admin">
		<li><a href="../Controllers/updatePost.php?id_post=<?php echo $post['id_post']; ?>">Aggiorna</a></li>
		<li><a href="../Controllers/deletePost.php?id_post=<?php echo $post['id_post']; ?>">Cancella</a></li>
	</ul>
	<div class="text"><?php echo $post['testo']; ?></div>
	
<?php endforeach; ?>


<ul class="button">
	<li><a  href="../index.php">Indietro</a></li>
</ul>

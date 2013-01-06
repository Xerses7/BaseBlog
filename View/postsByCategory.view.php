<h2 class="category">Categoria: <?php echo($nome_categoria); ?></h2>


<?php foreach ($posts as $post) : ?>
	<article>
	<h2 class="title"><a href="../Controllers/showPost.php?id_post=<?php echo $post['id_post']; ?>"><?php echo $post['titolo']; ?></a></h2>
	
	<ul class="tags">
		<?php foreach ($post['tags'] as $key => $tag) : ?>
			<li><a href="<?php echo($tagsContr); ?>?id_tag=<?php echo($key); ?>"><?php echo("$tag "); ?></a></li>
		<?php endforeach; ?>
	</ul>
	
	<?php if($canDisplay) : ?>
	<ul class="admin">
		<li><a href="../Controllers/updatePost.php?id_post=<?php echo $post['id_post']; ?>">Aggiorna</a></li>
		<li><a href="../Controllers/deletePost.php?id_post=<?php echo $post['id_post']; ?>">Cancella</a></li>
	</ul>
	<?php endif; ?>
	<div class="text"><?php echo $post['testo']; ?></div>
	<div class="datetime"><?php echo($post['data_ora']); ?></div>
	</article>
<?php endforeach; ?>


<ul class="button">
	<li><a  href="../index.php">Indietro</a></li>
</ul>

<ul id="pageNumbers">
<?php foreach ($pageNumbers as $number) : ?>	
		<li><?php echo ($number); ?></li>	
<?php endforeach; ?>
</ul>

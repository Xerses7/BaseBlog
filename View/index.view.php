
<?php if ($canDisplay) : ?>
<ul class="admin">
	<li><a href="./Controllers/createPost.php">Nuovo post</a></li>
</ul>
<?php endif; ?>

<?php foreach ($posts as $post) : ?>
	<h2 class="title"><a href="./Controllers/showPost.php?id_post=<?php echo $post['id_post']; ?>"><?php echo $post['titolo']; ?></a></h2>
	<div class="datetime"><?php echo($post['data_ora']); ?></div>
	<div class="category">Categoria: <a href="<?php echo($categoryContr); ?>?id_categoria=<?php echo($post['categoria_id']); ?>"><?php echo($post['categoria']); ?></a></div>

	<ul class="tags">
		<?php foreach ($post['tags'] as $key => $tag) : ?>
			<li><a href="<?php echo($tagsContr); ?>?id_tag=<?php echo($key); ?>"><?php echo("$tag "); ?></a></li>
		<?php endforeach; ?>
	</ul>
	
	<?php if ($canDisplay) : ?>
	<ul class="admin">
		<li><a href="./Controllers/updatePost.php?id_post=<?php echo $post['id_post']; ?>">Aggiorna</a></li>
		<li><a href="./Controllers/deletePost.php?id_post=<?php echo $post['id_post']; ?>">Cancella</a></li>
	</ul>
	<?php endif; ?>
	<div class="text"><?php echo $post['testo']; ?></div>
	
<?php endforeach; ?>

<ul id="pageNumbers">
<?php foreach ($pageNumbers as $number) : ?>	
		<li><?php echo ($number); ?></li>	
<?php endforeach; ?>
</ul>

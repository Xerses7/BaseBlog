<ul class="newPost">
	<li><a href="./Controllers/createPost.php">Nuovo post</a></li>
</ul>

<?php foreach ($posts as $post) : ?>
	<h2 class="title"><a href="./Controllers/showPost.php?id_post=<?php echo $post['id_post']; ?>"><?php echo $post['titolo']; ?></a></h2>
	<div class="datetime"><?php echo($post['data_ora']); ?></div>

	<ul class="tags">
		<?php foreach ($post['tags'] as $tag) : ?>
			<li><?php echo("$tag "); ?></li>
		<?php endforeach; ?>
	</ul>
	
	<ul class="admin">
		<li><a href="./Controllers/updatePost.php?id_post=<?php echo $post['id_post']; ?>">Aggiorna</a></li>
		<li><a href="./Controllers/deletePost.php?id_post=<?php echo $post['id_post']; ?>">Cancella</a></li>
	</ul>
	<div class="text"><?php echo $post['testo']; ?></div>
	
<?php endforeach; ?>



<h1>La mia home</h1>

<?php foreach ($posts as $post) : ?>
	<h2><?php echo $post['titolo']; ?></h2>
	<p><?php echo $post['testo']; ?></p>
<?php endforeach; ?>

<ul>
	<li><a href="./Controllers/createPost.php">Nuovo post</a></li>
	<li><a href="./Controllers/updatePost.php">Aggiorna post</a></li>
</ul>

<h1>La mia home</h1>

<?php foreach ($posts as $post) : ?>
	<h2><a href="./Controllers/showPost.php?id_post=<?php echo $post['id_post']; ?>"><?php echo $post['titolo']; ?></a></h2>
	<p><?php echo nl2br($post['testo']); ?></p>
	<a href="./Controllers/updatePost.php?id_post=<?php echo $post['id_post']; ?>">Aggiorna</a>
<?php endforeach; ?>

<ul>
	<li><a href="./Controllers/createPost.php">Nuovo post</a></li>
</ul>

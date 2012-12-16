<article>
<h1 class="title"><?php echo $titolo; ?></h1>
<div class="datetime"><?php echo($data_ora); ?></div>
<p><?php echo $testo; ?></p>
<a class="admin" href="../Controllers/updatePost.php?id_post=<?php echo $id_post; ?>">Aggiorna</a>
<ul class="button">
	<li><a href="../index.php">Indietro</a></li>
</ul>

<div class="Comments">
<h3>Commenti</h3>
<?php foreach($comments as $comment) : ?>
<p>Utente: <strong><?php echo $comment['user']; ?></strong></p>
<p><?php echo $comment['testo']; ?></p>
<?php endforeach; ?>
</div>

<h3>Commenta!</h3>
<form action="../Controllers/addComment.php" method="get">
	<input type="hidden" name="post_id" value="<?php echo $id_post; ?>">
	<label for="user">Utente: </label>
	<input type="text" name="user" id="user" />
	<label for="textComment">Commento: </label>
	<textarea name="textComment" id="textComment" rows="7" cols="25"></textarea>
	<input type="submit" value="Di' la tua!">
</form>
</article>


<h1>Aggiorna Post</h1>

<form action="./updatePost.php" method="post">

<input name="id_post" type="hidden" value="<?php echo $post['id_post']; ?>">

<label for="titolo">Titolo:</label>
<input name="titolo" type="text" value="<?php echo $post['titolo']; ?>">

<label for="testo">Testo: </label>
<textarea name="testo" rows="10" cols="30">
<?php 
echo $post['testo'];
?>
</textarea>

<input type="submit" value="Inserisci">

</form>

<br><a href="../index.php">Indietro</a>

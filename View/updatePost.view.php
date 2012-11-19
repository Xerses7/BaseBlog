<h1>Aggiorna Post</h1>

<form action="./updatePost.php" method="post">

<input name="id_post" type="hidden" value="<?php echo $data['id_post']; ?>">

<label for="titolo">Titolo:</label>
<input name="titolo" type="text" value="<?php echo $data['titolo']; ?>">

<label for="testo">Testo: </label>
<textarea name="testo" rows="10" cols="30">
<?php 
echo $data['testo'];
?>
</textarea>

<input type="submit" value="Inserisci">

</form>

<br><a href="../index.php">Indietro</a>

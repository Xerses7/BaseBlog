<h1>Nuovo Post</h1>

<form action="./createPost.php" method="post">
<label for="titolo">Titolo:</label>
<input name="titolo" type="text">

<label for="tags">Tag: </label>
<input name="tags" id="tags" type="text">

<label for="categories">Categoria: </label>
<select class="categories" name="categories">
	<?php foreach($categories as $category) : ?>
		<option value="<?php echo($category['id_categoria']); ?>"><?php echo($category['nome_categoria']); ?></option>
	<?php endforeach; ?>
</select>

<label for="testo">Testo: </label>
<textarea name="testo" rows="10" cols="30">
</textarea>

<input type="submit" value="Inserisci">

</form>
<?php
	if(isset($status)){
		echo $status;	
	}
?>

<ul class="button">
	<li><a  href="../index.php">Indietro</a></li>
</ul>

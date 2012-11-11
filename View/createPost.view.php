<h1>Nuovo Post</h1>

<form action="./createPost.php" method="post">
<label for="titolo">Titolo:</label>
<input name="titolo" type="text">

<label for="testo">Testo: </label>
<textarea name="testo" rows="10" cols="30">
</textarea>

<input type="submit" value="Inserisci">

</form>
<?php
	if($data){
		echo $data['status'];	
	}
?>

<br><a href="../index.php">Indietro</a>

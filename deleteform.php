<?php 
	require_once('connect.php');
?> 
					
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		

		<link href="main.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Ubuntu" rel="stylesheet"> 
	</head>
	<body>
		
		<div class="container">
			<span class="lowlet">Usuwanie klienta</span>

			<form method="POST" action="client.php" class="formularz">
				<label>ID: </label>
				<input type="text" placeholder="Identyfikator klienta" name="id">
				<label>Imię: </label>
				<input type="text" placeholder="Imię" name="firstname">
				<label>Nazwisko: </label>
			    <input type="text" placeholder="Nazwisko" name="lastname">
				<button type="submit" name="delete" value="add">Usuń klienta</button>
			</form>
			<a href="index.php" class="strz">&larr; Spis Klientów</a>
			<a href="addform.php" class="strz" style="float:right;">&rarr; Dodaj klienta</a>
		</div>
		
	</body>
</html>
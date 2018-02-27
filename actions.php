<?php 
	require_once('connect.php');

function addclient()
{
	echo '	<!DOCTYPE html>
			<html lang="pl">
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


					<link href="main.css" rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Ubuntu" rel="stylesheet"> 
				</head>
				<body>

					<div class="container">
						<span class="lowlet">Dodawanie klienta</span>

						<form method="POST" action="client.php" class="formularz">
							<label>Imię: </label>
							<input type="text" placeholder="Imię" name="firstname">
							<label>Nazwisko: </label>
							<input type="text" placeholder="Nazwisko" name="lastname">
							<label>Samochód: </label>
							<input type="text" placeholder="Samochód(marka i rok)" name="car">
							<label>Kontakt: </label>
							<input type="text" placeholder="Kontakt" name="contact">
							<label>Rachunek: </label>
							<input type="text" placeholder="Rachunek (BRUTTO w zł)" name="bill">
							<button type="submit" name="add" value="add">Dodaj klienta</button>

						</form>
						<a href="index.php" class="strz">&larr; Spis Klientów</a>
						<a href="form.php" class="strz" style="float:right;">&rarr; Edytuj klienta</a>
					</div>

				</body>
			</html>';
}

function editclient()
{
	echo	'<!DOCTYPE html>
			<html lang="pl">
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


					<link href="main.css" rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Ubuntu" rel="stylesheet"> 
				</head>
				<body>

					<div class="container">
						<span class="lowlet">Edytowanie klienta</span>

						<form method="POST" action="client.php" class="formularz">
							<label>ID: </label>
							<input type="text" placeholder="Identyfikator klienta" name="id">
							<label>Imię: </label>
							<input type="text" placeholder="Imię" name="firstname">
							<label>Nazwisko: </label>
							<input type="text" placeholder="Nazwisko" name="lastname">
							<label>Samochód: </label>
							<input type="text" placeholder="Samochód(marka i rok)" name="car">
							<label>Kontakt: </label>
							<input type="text" placeholder="Kontakt" name="contact">
							<label>Rachunek: </label>
							<input type="text" placeholder="Rachunek (BRUTTO w zł)" name="bill">
							<button type="submit" name="edit" value="add">Edytuj klienta</button>
						</form>
						<a href="index.php" class="strz">&larr; Spis Klientów</a>
						<a href="deleteform.php" class="strz" style="float:right;">&rarr; Usuń klienta</a>
					</div>

				</body>
			</html>';
}

function deleteclient()
{
	echo '<!DOCTYPE html>
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
		</html>';
}
			
?> 
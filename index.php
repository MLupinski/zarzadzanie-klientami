<?php 
	require_once('funkcje.php');
 	connect();
echo '					
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		

		<link href="css/main.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Ubuntu" rel="stylesheet"> 
	</head>
	<body>
		
		<div class="container">';

if(isset($_POST['add']))
{
	echo '
			<span class="lowlet">Dodawanie klienta</span>
			<form method="POST" action="" class="formularz">
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
				<button type="submit" name="clientadd" value="clientadd">Dodaj klienta</button>
			</form>
			<a href="index.php" class="strz">&larr; Spis Klientów</a>';
}
else if(isset($_POST['edit']))
{
	echo '
			<span class="lowlet">Edycja klienta</span>
			<form method="POST" action="" class="formularz">
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
				<button type="submit" name="clientedit" value="clientedit">Edytuj klienta</button>
			</form>
			<a href="index.php" class="strz">&larr; Spis Klientów</a>';
}
else if(isset($_POST['delete']))
{
	echo ' 
			<span class="lowlet">Usuwanie klienta</span>
			<form method="POST" action="" class="formularz">
				<label>ID: </label>
				<input type="text" placeholder="Identyfikator klienta" name="id">
				<label>Imię: </label>
				<input type="text" placeholder="Imię" name="firstname">
				<label>Nazwisko: </label>
				<input type="text" placeholder="Nazwisko" name="lastname">
				<button type="submit" name="clientdelete" value="clientdelete">Usuń klienta</button>
			</form>
			<a href="index.php" class="strz">&larr; Spis Klientów</a>';
}
else
{
	echo '
			<h2>Spis klientów firmy <span style="color: red;">AUTOCRASH</span></h2>';
	if(isset($_POST['clientadd']))
	{
		addclient();
	}
	else if(isset($_POST['clientedit']))
	{
		editclient();
	}
	else if(isset($_POST['clientdelete']))
	{
		deleteclient();
	}
	echo	'<table>
				<tr>
					<th>LP.</th>
					<th>Imię</th>
					<th>Nazwisko</th>
					<th>Samochód</th>
					<th>Kontakt</th>
					<th>Rachunek (BRUTTO)</th>
				</tr>';
				$stmt = $pdo->query('SELECT * FROM klienci');
					
					foreach($stmt as $row)
					{
						echo '<tr>';
						echo '<td>'.$row['ID'].'.</td>';
						echo '<td>'.$row['Imie'].'</td>';
						echo '<td>'.$row['Nazwisko'].'</td>';
						echo '<td>'.$row['Samochod'].'</td>';
						echo '<td>'.$row['Kontakt'].'</td>';
						echo '<td>'.$row['Rachunek'].' zł</td>';
						echo '</tr>';
					}
					$stmt->closeCursor();
				
			echo '</table>
			<div class="form">
				<form method="POST" action="index.php">
					<button type="submit" name="add" value="add">Dodaj klienta</button>
				</form>
			</div>
			<div class="form">
				<form method="POST" action="index.php">
					<button type="submit" name="edit" value="edit">Edytuj klienta</button>
				</form>
			</div>
			<div class="form">
				<form method="POST" action="index.php">
					<button type="submit" name="delete" value="delete">Usuń klienta</button>
				</form>
			</div>
			<div style="clear:both;"></div>';
}
echo 	'</div>
		
	</body>
</html>';

?>
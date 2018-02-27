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
			<h2>Spis klientów firmy <span style="color: red;">AUTOCRASH</span></h2>
			<table>
				<tr>
					<th>LP.</th>
					<th>Imię</th>
					<th>Nazwisko</th>
					<th>Samochód</th>
					<th>Kontakt</th>
					<th>Rachunek (BRUTTO)</th>
				</tr>
				<?php
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
				?>
				
			</table>
			<div class="form">
				<form method="POST" action="addform.php">
					<button type="submit" name="client" value="add">Dodaj klienta</button>
				</form>
			</div>
			<div class="form">
				<form method="POST" action="editform.php">
					<button type="submit" name="client" value="edit">Edytuj klienta</button>
				</form>
			</div>
			<div class="form">
				<form method="POST" action="deleteform.php">
					<button type="submit" name="client" value="delete">Usuń klienta</button>
				</form>
			</div>
			<div style="clear:both;"></div>
		</div>
		
	</body>
</html>
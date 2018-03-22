<?php
require_once("funkcje.php");
connect();
$id = $_GET['id'];

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
		<div class="container">
			<h2>Podgląd klienta firmy <span style="color: red;">AUTOCRASH</span></h2>
			<div class="data">
				<p>Samochód:</p>';
				$stmt = $pdo->prepare('SELECT * FROM cars INNER JOIN klienci ON cars.klienci_id = klienci.ID WHERE klienci_id=:id');
				$stmt->bindParam(':id',$id);
                $stmt->execute();
					
				foreach($stmt as $row)
				{
					echo $row['Imie'];
					echo ' '.$row['Nazwisko'];
					echo '</br>';
					echo $row['CAR'];
					$rep = $row['REP'];
						
				}
				$stmt->closeCursor();			
			echo '</div>
			<div class="diagnose">
				<div class="diag">
					<p>DIAGNOZA</p>';
				$stmt = $pdo->prepare('SELECT * FROM cars WHERE klienci_id=:id');
				$stmt->bindParam(':id',$id);
                $stmt->execute();
					
				foreach($stmt as $row)
				{
					echo $row['DIAG'];
					$done = $row['DONE'];
					$id = $row['ID'];
					$klienci_id = $row['klienci_id'];
				}
				$stmt->closeCursor();
			if ($done == 0)
			{
				echo '	
				<form method="POST" action="index.php?id='.$klienci_id.'">
					<button type="submit" name="diagnose" value="diagnose" class="button">Uzupełnij diagnozę</button>
				</form>';	
			}
			else
			{
				echo '
					<button type="button" disabled>Naprawa Zakończona</button>';
			}		
				echo '</div>';
				if ($done == 0)
				{
					echo '
					<form method="POST" action="car.php?id='.$klienci_id.'">
						<button type="submit" name="repair" class="button2">Naprawa Zakończona</button>
					</form>';	
				}
				else
				{
					echo '
					<form method="POST" action="car.php?id='.$klienci_id.'">
						<button type="button" disabled>Naprawa Zakończona</button>
						<button type="submit" name="resrepair" class="button2">Wznów naprawę</button>
					</form>';
				}
			echo '	
			</div>
			<div style="clear:both;"></div>
			<div class="diag-img">';
			switch($rep)
			{
				case 0: echo '<img src="img/0.gif" alt="Objawy" />';
					break;
				case 1: echo '<img src="img/1.gif" alt="Objawy" />';
					break;
				case 2: echo '<img src="img/2.gif" alt="Objawy" />';
					break;
				case 3: echo '<img src="img/3.gif" alt="Objawy" />';
					break;
				case 4: echo '<img src="img/4.gif" alt="Objawy" />';
					break;
				case 5: echo '<img src="img/5.gif" alt="Objawy" />';
					break;
				case 6: echo '<img src="img/6.gif" alt="Objawy" />';
					break;
				case 7: echo '<img src="img/7.gif" alt="Objawy" />';
					break;
				case 8: echo '<img src="img/8.gif" alt="Objawy" />';
					break;
				case 9: echo '';
					break;
			}
			if(isset($_POST['adddiag']))
			{
				adddiagnose();
				header('refresh: 1;');
			}
			else if(isset($_POST['repair']) || isset($_POST['resrepair']))
			{
				repair();
				header('refresh: 1;');
			}
			echo '</div>
			<a href="index.php">Powrót</a>
		</div>
		
	</body>
</html>';
?>
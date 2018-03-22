<?php 

function connect()
{
	try
	{
		global $pdo;
		$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'test');
		$pdo->query('SET NAMES utf8');
		$pdo->query('SET CHARACTER_SET utf8_unicode_ci');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo 'Połączenie nie mogło zostać utworzone: '. $e->getMessage();
	}
}

function addclient()
{
	if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['car']) || empty($_POST['contact']) || empty($_POST['bill']))
	{
		echo '<div class="error">Wystąpił błąd w dodawaniu klienta! Upewnij się, że wypełniłeś wszystkie pola formularza.</div>';	
	}
	else
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$car = $_POST['car'];
		$contact = $_POST['contact'];
		$bill = $_POST['bill'];

		global $pdo;
		$stmt = $pdo->query("INSERT INTO klienci SET Imie = '$firstname', Nazwisko = '$lastname', Samochod = '$car', Kontakt = '$contact', Rachunek 	='$bill'");	
		$stmt->closeCursor();
		$stmt=null;
		addcar();
		echo '<div class="noerror">Klient został dodany do bazy.</div>';	
	}
	
}

function addcar()
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	global $pdo;
	$stmt = $pdo->query("SELECT ID, Samochod FROM klienci WHERE Imie = '$firstname' AND Nazwisko = '$lastname'");
	foreach($stmt as $row)
	{
		$id = $row['ID'];
		$car = $row['Samochod'];
	}
	$stmt = $pdo->query("INSERT INTO cars SET CAR = '$car', REP = 0, DONE = 0, klienci_id = '$id'");	
	$stmt->closeCursor();
	$stmt=null;
}

function editclient()
{
	if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['car']) || empty($_POST['contact']) || empty($_POST['bill']))
	{
		echo '<div class="error">Wystąpił błąd w edycji klienta! Upewnij się, że wypełniłeś wszystkie pola formularza.</div>';	
	}
	else
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$car = $_POST['car'];
		$contact = $_POST['contact'];
		$bill = $_POST['bill'];
		$id = $_POST['id'];

		global $pdo;
		$stmt = $pdo->query("UPDATE klienci SET Imie = '$firstname', Nazwisko = '$lastname', Samochod = '$car', Kontakt = '$contact', Rachunek ='$bill' WHERE ID='$id'");			
		$stmt->closeCursor();
		$stmt=null;

		echo '<div class="noerror">Dane klienta zostały zmienione.</div>';
	}
	
}

function deleteclient()
{
	if(empty($_POST['id']) || empty($_POST['firstname']) || empty($_POST['lastname']))
	{
		echo '<div class="error">Wystąpił błąd podczas usuwania klienta! Upewnij się, że wypełniłeś wszystkie pola formularza.</div>';	
	}
	else
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$id = $_POST['id'];

		global $pdo;
		$stmt = $pdo->query("DELETE FROM klienci WHERE ID ='$id'");			
		$stmt->closeCursor();
		$stmt=null;	
		
		echo '<div class="noerror">Klient został usunięty z bazy.</div>';
	}
}
function repair()
{
	if(isset($_POST['repair']))
	{
	 	$id = $_GET['id'];
		global $pdo;
		$stmt = $pdo->query("UPDATE cars SET DONE = 1 WHERE ID = '$id'");			
		$stmt->closeCursor();
		$stmt=null;  
	}
	else
	{
		$id = $_GET['id'];
		global $pdo;
		$stmt = $pdo->query("UPDATE cars SET DONE = 0 WHERE ID = '$id'");			
		$stmt->closeCursor();
		$stmt=null;     
	}
	
}

function adddiagnose()
{
	$diag = $_POST['add'];
	$id = $_GET['id'];
	$rep = $_POST['diagnr'];
	global $pdo;
	$stmt = $pdo->query("SELECT DIAG FROM cars WHERE ID='$id'");
	foreach($stmt as $row)
	{
		$diag1 = $row['DIAG'];
	}
	$stmt = $pdo->query("UPDATE cars SET DIAG = '$diag1 $diag', REP = '$rep' WHERE ID = '$id'");
	$stmt->closeCursor();
	$stmt=null;
}
			
?> 
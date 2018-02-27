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
		$stmt = $pdo->query("INSERT INTO klienci SET Imie = '$firstname', Nazwisko = '$lastname', Samochod = '$car', Kontakt = '$contact', Rachunek 	='$bill'");	$stmt->closeCursor();
		$stmt=null;
	
		header('Location: index.php');	
	}
	
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

		header('Location: index.php');	
	}
	
}

function deleteclient()
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$id = $_POST['id'];

	$stmt = $pdo->query("DELETE FROM klienci WHERE ID ='$id'");			
	$stmt->closeCursor();
	$stmt=null;	
	
	header('Location: index.php');
}
			
?> 
<?php

	require_once("connect.php");

	if(isset($_POST['add']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$car = $_POST['car'];
		$contact = $_POST['contact'];
		$bill = $_POST['bill'];

		$stmt = $pdo->query("INSERT INTO klienci SET Imie = '$firstname', Nazwisko = '$lastname', Samochod = '$car', Kontakt = '$contact', Rachunek ='$bill'");			
		$stmt->closeCursor();
		$stmt=null;

		header('Location: form.php');
	}
	elseif(isset($_POST['edit']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$car = $_POST['car'];
		$contact = $_POST['contact'];
		$bill = $_POST['bill'];
		$id = $_POST['id'];

		$stmt = $pdo->query("UPDATE klienci SET Imie = '$firstname', Nazwisko = '$lastname', Samochod = '$car', Kontakt = '$contact', Rachunek ='$bill' WHERE ID='$id'");			
		$stmt->closeCursor();
		$stmt=null;

		header('Location: form.php');
	}	
	else
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$id = $_POST['id'];

		$stmt = $pdo->query("DELETE FROM klienci WHERE ID ='$id'");			
		$stmt->closeCursor();
		$stmt=null;	
		header('Location: form.php');
	}
	
?>
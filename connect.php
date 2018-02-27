<?php

	try
	{
		$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'test');
		$pdo->query('SET NAMES utf8');
		$pdo->query('SET CHARACTER_SET utf8_unicode_ci');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo 'Połączenie nie mogło zostać utworzone: '. $e->getMessage();
	}
?>
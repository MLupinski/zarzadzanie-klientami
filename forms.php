<?php 
	require_once('connect.php');
	require_once('actions.php');

	if(isset($_POST['add']))
	{
		addclient();
	}
	elseif(isset($_POST['edit']))
	{
		editclient();
	}
	else
	{
		deleteclient();
	}

?> 
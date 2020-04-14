<?php
	session_Start();
	require('service/functions.php');

	if(isset($_REQUEST['login']))
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		
		if(empty($username) || empty($password))
		{
			header("Location: Login.php");
		}
		else
		{
			$user = validate($username,$password);
			$_SESSION['user'] = $user; 
			header("Location: PremiumHome.php");
		}
	}
	else
	{
		header("location: Login.php");
	}
?>
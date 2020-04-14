<?php
	session_Start();
	require('service/functions.php');

	if(isset($_REQUEST['login']))
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$user = validate($username,$password);

		if(count($user)>0)
		{
			$_SESSION['user'] = $user;
			header("location: PremiumHome.php");
		}
		else
		{
			header("location: Login.php");
		}

	}
	else
	{
		header("location: Login.php");
	}
?>
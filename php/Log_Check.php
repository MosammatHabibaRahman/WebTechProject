<?php
	session_Start();
	require('../service/functions.php');

	if(isset($_REQUEST['login']))
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$user = validate($username,$password);

		if(count($user)>0)
		{
			$_SESSION['user'] = $user;
			$usertype = $_SESSION['user']['usertype'];
		
			if($usertype == "Premium Student")
			{
				header("location: ../views/PremiumHome.php");
			}
			else
			{
				header("location: ../views/userprofile.php");
			}
		}
		else
		{
			header("location: ../views/Login.php");
		}

	}
	else
	{
		header("location: ../views/Login.php");
	}
?>
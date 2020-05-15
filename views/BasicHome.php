<?php
    session_start();
    require('../service/functions.php');

	if(!isset($_SESSION['user']['s_id']) && $_SESSION['user']['usertype'] != "Basic Student")
	{
		header("location: Login.php");
    }

    $id = $_SESSION['user']['s_id'];
    $username = $_SESSION['user']['username'];
?>
<html>
    <head><title>Basic Home</title></head>
    <h1>Basic Home Page</h1>
    <h2>Welcome <?=$username?></h2>
</html>
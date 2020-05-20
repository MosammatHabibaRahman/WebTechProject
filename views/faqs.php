<?php
    session_start();
    require('../service/functions.php');

	if(!isset($_SESSION['user']['s_id']))
	{
		header("location: Login.php");
    }
?>
<html>
    <head><title>FAQs</title></head>
    <body>
        <center>
            <h1>Welcome to the FAQs page!</h1>
        </center>
        <ul>
            <li>What is Learning Field? It's an online education platform where anyone can learn or even teach any subject.</li>
            <li>How does it work? It's a subscription based service - only $9.99 per month.</li>
        </ul>
        <center>
            <a href="PremiumHome.php">Go Back</a>
        </center>
    </body>
</html>
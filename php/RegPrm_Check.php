<?php
	session_start();
	require('../service/functions.php');

	if(isset($_REQUEST['signup']))
	{
		$username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$password_conf = $_REQUEST['password_conf'];
		$gender = $_REQUEST['gender'];
		$cardno = $_REQUEST['cardno'];
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		$expdate = $year.'-'.$month.'-'.$day;
		$code = $_REQUEST['code'];
		$usertype = "Premium Student";
		$propic = "GenericPic.jpeg";
		
		if(empty($username) || empty($email) || empty($password) || empty($password_conf) || empty($gender) || empty($cardno) || empty($day) || empty($month) || empty($year) || empty($code))
		{
			
			echo "Some Field(s) are empty";
			/* setcookie('premium','Premium Student',time()+120,'/');
			header("location: ../views/RegisterPrm.php"); */
		}
		else if($password != $password_conf)
		{	
			echo "Passwords do not match";
			/* setcookie('premium','Premium Student',time()+120,'/');
			header("location: ../views/RegisterPrm.php"); */
		}
		else if($day<=0 || $day>31 || $month<=0 || $month>12 || $year<=2019)
		{
			echo "Expiration date is incorrect";
			/* setcookie('premium','Premium Student',time()+120,'/');
			header("location: ../views/RegisterPrm.php"); */
		}
		else if(strlen($code) < 3 || strlen($code) > 4)
		{
			echo "Security Code should be 2-3 characters in length";
			/* setcookie('premium','Premium Student',time()+120,'/');
			header("location: ../views/RegisterPrm.php"); */
		}
		else if(strlen($cardno) < 13 || strlen($cardno) > 16)
		{
			echo "Card Number should be 13-16 characters in length";
			/* setcookie('premium','Premium Student',time()+120,'/');
			header("location: ../views/RegisterPrm.php"); */
		}
		else
		{
			$result = register($username, $email, $password, $gender, $cardno, $expdate, $code, $usertype, $propic);
			header("location: ../views/Login.php");
		}
	}
	
	if(isset($_REQUEST['cancel']))
	{
		header("location: Cancel.php");
	}
?>
<html>
	<a href = "../views/RegisterPrm.php">Go Back</a>
</html>
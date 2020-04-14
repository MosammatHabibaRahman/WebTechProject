<?php
	require('service/functions.php');

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
			setcookie('premium','Premium Student',time()+120,'/');
			header("location: RegisterPrm.php");
		}
		else if($password != $password_conf)
		{	
			setcookie('premium','Premium Student',time()+120,'/');
			header("location: RegisterPrm.php");
		}
		else if($day<=0 || $day>31 || $month<=0 || $month>12 || $year<=2019)
		{
			setcookie('premium','Premium Student',time()+120,'/');
			header("location: RegisterPrm.php");
		}
		else if($code <= 99 || $code >= 999)
		{
			setcookie('premium','Premium Student',time()+120,'/');
			header("location: RegisterPrm.php");
		}
		else if(strlen($cardno) <13 || strlen($cardno) > 16)
		{
			setcookie('premium','Premium Student',time()+120,'/');
			header("location: RegisterPrm.php");
		}
		else
		{
			$result = register($username, $email, $password, $gender, $cardno, $expdate, $code, $usertype, $propic);
			header("location: Login.php");
		}
	}
	
	if(isset($_REQUEST['cancel']))
	{
		header("location: Cancel.php");
	}
?>
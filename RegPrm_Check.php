<?php
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
		$code = $_REQUEST['code'];
        $usertype = "Premium Student";
		
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
		else
		{
			$lines = file("Reg_Info.txt");
			$num = count($lines)+1;
			$id = "P-".$num;
			
			$file = fopen("Reg_Info.txt", 'a');
			$str = $id."|".$username."|".$email."|".$password."|".$gender."|".$cardno."|".$day."|".$month."|".$year."|".$code."|".$usertype;
			fwrite($file,$str."\r\n");
			fclose($file);

			header("location: Login.php");
		}
	}
	
	if(isset($_REQUEST['cancel']))
	{
		header("location: Cancel.php");
	}
?>
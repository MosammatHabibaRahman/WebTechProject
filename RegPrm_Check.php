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
		
		if(empty($username ||$email || $password || $password_conf || $gender || $cardno || $day || $month || $year || $code))
		{
			echo "Please fill up all fields.";
		}
		else if($password != $password_conf)
		{	
			echo "Passwords must match!";
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
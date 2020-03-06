<?php
	session_start();
	if(isset($_REQUEST['update']) && isset($_SESSION['id']))
	{
        $id = $_SESSION['id'];
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
		$gender = $_REQUEST['gender'];
		$cardno = $_REQUEST['cardno'];
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		$code = $_REQUEST['code'];

        $file = fopen("Reg_Info.txt",'r');
        $lines = array();
		$i = 0;
		while(!feof($file))
		{
            array_push($lines,fgets($file));
        }
    }
    else
    {
        header("location: Profile.php");
    }
?>
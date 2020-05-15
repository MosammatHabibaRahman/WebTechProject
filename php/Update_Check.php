<?php
    session_start();
    require('../service/functions.php');

	if(isset($_REQUEST['update']) && isset($_SESSION['user']['s_id']))
	{
        $id = $_SESSION['user']['s_id'];
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
		$gender = $_REQUEST['gender'];
		$cardno = $_REQUEST['cardno'];
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		$expdate = $year.'-'.$month.'-'.$day;
		$code = $_REQUEST['code'];
		
		if(empty($username) || empty($email) || empty($gender) || empty($cardno) || empty($day) || empty($month) || empty($year) || empty($code))
		{
			header("location: ../views/Update.php");
		}
		else if($day<=0 || $day>31 || $month<=0 || $month>12 || $year<=2019)
		{
			header("location: ../views/Update.php");
		}
		else if($code <= 99 || $code >= 999)
		{
			header("location: ../views/Update.php");
		}
		else if(strlen($cardno) <13 || strlen($cardno) > 16)
		{
			header("location: ../views/Update.php");
		}
		else
		{
			$result = updateStudent($id,$username, $email, $gender, $cardno, $expdate, $code);
			if($result != "Error")
			{
				header("location: ../views/Profile.php");
			}
			else
			{
				echo $result;
			}
		}

	}
	else if(isset($_REQUEST['cancel']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/Profile.php");
    }
    else
    {
        header("location: ../views/Login.php");
    }
?>
<html>
    <a href = "../views/Update.php">Go Back</a>
</html>
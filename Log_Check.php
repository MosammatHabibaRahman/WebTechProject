<?php
	session_Start();

	if(isset($_REQUEST['login']))
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$file = fopen("Reg_Info.txt",'r');
		
		if(empty($username) || empty($password))
		{
			header("Location: Login.php");
		}
		else
		{
			while(!feof($file))
			{
				$info = fgets($file);
				$data = explode('|',$info);
				$flag = false;

				if($username == $data[1] && $password == $data[3])
				{
					$flag = true;

					$_SESSION['id'] = trim($data[0]);
					$_SESSION['username'] = trim($data[1]);
					$_SESSION['email'] = trim($data[2]);
					$_SESSION['password'] = trim($data[3]);
					$_SESSION['gender'] = trim($data[4]);
					$_SESSION['cardno'] = trim($data[5]);
					$_SESSION['day'] = trim($data[6]);
					$_SESSION['month'] = trim($data[7]);
					$_SESSION['year'] = trim($data[8]);
					$_SESSION['code'] = trim($data[9]);
					$_SESSION['usertype'] = trim($data[10]);

					header("Location: PremiumHome.php");
				}
			}

			if($flag == false)
			{
				echo "Invalid Username or Password."."<br>";
				echo "<a href = "."LearningField.php".">Register Here</a>";
			}
		}
	}
	else
	{
		header("location: Login.php");
	}
?>
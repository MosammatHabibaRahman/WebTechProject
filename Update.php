<?php
	session_start();
	if(!isset($_SESSION['user']['s_id']))
	{
		header("location: Login.php");
    }
    else
    {
        $id = $_SESSION['user']['s_id'];
        $username = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
        $password = $_SESSION['user']['password'];
        $gender = $_SESSION['user']['gender'];
        $cardno = $_SESSION['user']['card no'];
        $date = $_SESSION['user']['expdate'];
        $code = $_SESSION['user']['code'];
        $usertype = $_SESSION['user']['usertype'];
        $propic = $_SESSION['user']['propic'];
        $path = "ProfilePictures/".$propic;

		$splitdate = explode('-',$date);
		$day = $splitdate[2];
		$month = $splitdate[1];
		$year = $splitdate[0];
    }
?>

<html>
	<head>
		<title>Update Profile</title>
	</head>
	<body>
		<table width = 1010px>
            <tr>
                <td></td>
                <td width = 35px><a href = "Logout.php"><img src = "logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
		<br>
		<br>
		<br>
		<br>
		<form method = "POST" action = "Update_Check.php">
			<center>
				<fieldset style="width:350px">
					<legend>Update Profile</legend>
					<table>
						<tr>
							<td>User Name: </td>
							<td><center><input type = "text" name = "username" value = <?= $username?>></center></td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><center><input type = "email" name = "email" value = <?= $email?>></center></td>
						</tr>
						<tr>
							<td>Gender: </td>
							<td>
								<center>
									<input id = "Male" type = "radio" name = "gender" value = "Male"> Male
									<input id = "Female" type = "radio" name = "gender" value = "Female"> Female
									<input id = "Other" type = "radio" name = "gender" value = "Other"> Other
								</center>
							</td>
						</tr>
						<tr>
							<td>Card Number: </td>
							<td><center><input type = "text" name = "cardno" value = <?= $cardno?>></center></td>
						</tr>
						<tr>
							<td>Expiration Date: </td>
							<td>
								<center>
									<input type = "text" name = "day" value = <?= $day?> size = "4">/
									<input type = "text" name = "month" value = <?= $month?> size = "5">/
									<input type = "text" name = "year" value = <?= $year?> size = "4">
								</center>
							</td>
						</tr>
						<tr>
							<td>Security Code: </td>
							<td><center><input type = "password" name = "code" value = <?= $code?>></center></td>
						</tr>
						<tr>
							<td colspan = 2>
								<center>
									<input type = "submit" name = "update" value = "Update">
									<input type = "submit" name = "cancel" value = "Cancel">
								</center>
							</td>
						</tr>
					</table>
				</fieldset>
			</center>
		</form>
		
		<script>
			var gender = "<?=$gender?>";
			var Male = document.getElementById('Male');
			var Female = document.getElementById('Female');
			var Other = document.getElementById('Other');
			
			if(gender == Male.value)
			{
				Male.checked = true;
			}
			else if(gender == Female.value)
			{
				Female.checked = true;
			}
			else
			{
				Other.checked = true;
			}
		</script>
	</body>
</html>
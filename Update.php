<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location: Login.php");
    }
    else
    {
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $gender = $_SESSION['gender'];
        $cardno = $_SESSION['cardno'];
        $day = $_SESSION['day'];
        $month = $_SESSION['month'];
        $year = $_SESSION['year'];
        $code = $_SESSION['code'];
		$usertype = $_SESSION['usertype'];
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
		<form method = "POST" action = "Profile_Check.php">
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
									<input type = "radio" name = "gender" value = "Male"> Male
									<input type = "radio" name = "gender" value = "Female"> Female
									<input type = "radio" name = "gender" value = "Other"> Other
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
	</body>
</html>
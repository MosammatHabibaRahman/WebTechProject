<?php
	session_start();
	if(!isset($_COOKIE['premium']))
	{
		header("location: LearningField.php");
	}
?>

<html>
	<head>
		<title>Premium Student Registration</title>
	</head>
	<body>
		<br>
		<br>
		<br>
		<br>
		<form method = "POST" action = "RegPrm_Check.php">
			<center>
				<fieldset style="width:350px">
					<legend>Premium Student Registration</legend>
					<table>
						<tr>
							<td>User Name: </td>
							<td><center><input type = "text" name = "username" value = ""></center></td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><center><input type = "email" name = "email" value = ""></center></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><center><input type = "password" name = "password" value = ""></center></td>
						</tr>
						<tr>
							<td>Confirm Password: </td>
							<td><center><input type = "password" name = "password_conf" value = ""></center></td>
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
							<td><center><input type = "number" name = "cardno" value = ""></center></td>
						</tr>
						<tr>
							<td>Expiration Date: </td>
							<td>
								<center>
									<input type = "text" name = "day" value = "" size = "4">/
									<input type = "text" name = "month" value = "" size = "5">/
									<input type = "text" name = "year" value = "" size = "4">
								</center>
							</td>
						</tr>
						<tr>
							<td>Security Code: </td>
							<td><center><input type = "password" name = "code" value = ""></center></td>
						</tr>
						<tr>
							<td colspan = 2>
								<center>
									<input type = "submit" name = "signup" value = "Sign Up">
									<input type = "submit" name = "cancel" value = "Cancel">
								</center>
							</td>
						</tr>
					</table>
				</fieldset>
				<br>
				Already have an account? <a href = "Login.php"><u>Sign In</u></a>
			</center>
		</form>
	</body>
</html>
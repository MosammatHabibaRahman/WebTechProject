<?php
	session_start();
	if(!isset($_SESSION['RegCheck']))
	{
		header("location: ../LearningField.php");
	}
	else if($_SESSION['RegCheck'] != "premium")
	{
		header("location: ../BasicHome.php");
	}
	else
	{
		unset($_SESSION['RegCheck']);
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
		<form name = "myform" method = "POST" action = "../php/RegPrm_Check.php">
			<center>
				<h5 id = "err" style = "color:red;"></h5>
				<fieldset style="width:350px">
					<legend>Premium Student Registration</legend>
					<table>
						<tr>
							<td>User Name: </td>
							<td><center><input type = "text" id = "name" name = "username" value = ""></center></td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><center><input type = "email" id = "email" name = "email" value = ""></center></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><center><input type = "password" id = "password" name = "password" value = ""></center></td>
						</tr>
						<tr>
							<td>Confirm Password: </td>
							<td><center><input type = "password" id = "password_conf" name = "password_conf" value = ""></center></td>
						</tr>
						<tr>
							<td>Gender: </td>
							<td>
								<center>
									<input type = "radio" id = "male" name = "gender" value = "Male"> Male
									<input type = "radio" id = "female" name = "gender" value = "Female"> Female
									<input type = "radio" id = "other" name = "gender" value = "Other"> Other
								</center>
							</td>
						</tr>
						<tr>
							<td>Card Number: </td>
							<td><center><input type = "number" id = "cardno" name = "cardno" value = ""></center></td>
						</tr>
						<tr>
							<td>Expiration Date: </td>
							<td>
								<center>
									<input type = "text" id = "day" name = "day" value = "" size = "4">/
									<input type = "text" id = "month" name = "month" value = "" size = "5">/
									<input type = "text" id = "year" name = "year" value = "" size = "4">
								</center>
							</td>
						</tr>
						<tr>
							<td>Security Code: </td>
							<td><center><input type = "password" id = "code" name = "code" value = ""></center></td>
						</tr>
						<tr>
							<td colspan = 2>
								<center>
									<input type = "button" id = "signup" name = "signup" value = "Sign Up" onclick = "Check()">
									<input type = "submit" id = "cancel" name = "cancel" value = "Cancel">
								</center>
							</td>
						</tr>
					</table>
				</fieldset>
				<br>
				Already have an account? <a href = "Login.php"><u>Sign In</u></a>
			</center>
		</form>

		<script type = "text/javascript">
			
			function Check()
			{
				var name = document.getElementById('name').value.trim();
				var email = document.getElementById('email').value.trim();
				var password = document.getElementById('password').value.trim();
				var password_conf = document.getElementById('password_conf').value.trim();
				var cardno = document.getElementById('cardno').value.trim();
				var day = document.getElementById('day').value.trim();
				var month = document.getElementById('month').value.trim();
				var year = document.getElementById('year').value.trim();
				var code = document.getElementById('code').value.trim();
				
				if(name == "")
				{
					document.getElementById('err').innerHTML = "Please enter a username";
				}
				else if(email == "")
				{
					document.getElementById('err').innerHTML = "Please enter your email";
				}
				else if(password == "")
				{
					document.getElementById('err').innerHTML = "Please enter a password";
				}
				else if(password_conf == "")
				{
					document.getElementById('err').innerHTML = "Please confirm your password";
				}
				else if(password != password_conf)
				{
					document.getElementById('err').innerHTML = "The passwords do not match, please enter the same password in both fields.";
				}
				else if(!document.getElementById('male').checked && !document.getElementById('female').checked && !document.getElementById('other').checked)
				{
					document.getElementById('err').innerHTML = "Please select a gender";
				}
				else if(cardno == "")
				{
					document.getElementById('err').innerHTML = "Please enter your card number";
				}
				else if(cardno.length < 13 || cardno.length > 16)
				{
					document.getElementById('err').innerHTML = "Card Number should be 13-16 characters in length";
				}
				else if(day == "" || month == "" || year == "")
				{
					document.getElementById('err').innerHTML = "Please enter your card expiration date";
				}
				else if(day<=0 || day>31 || month<=0 || month>12 || year<=2019)
				{
					document.getElementById('err').innerHTML = "Please recheck the expiration date you have entered";
				}
				else if(code == "")
				{
					document.getElementById('err').innerHTML = "Please enter your card security code";
				}
				else if(code.length < 3 || code.length > 4)
				{
					document.getElementById('err').innerHTML = "Security Code should be 2-3 characters in length";
				}
				else
				{
					document.getElementById('signup').setAttribute('type','submit');
					document.getElementById('signup').click();
				}
			}
		</script>
	</body>
</html>
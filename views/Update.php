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
                <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
		<br>
		<br>
		<br>
		<br>
		<form method = "POST" action = "../php/Update_Check.php">
			<center>
				<h5 id = "err" style = "color:red;"></h5>
				<fieldset style="width:350px">
					<legend>Update Profile</legend>
					<table>
						<tr>
							<td>User Name: </td>
							<td><center><input type = "text" id = "name" name = "username" value = <?= $username?>></center></td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><center><input type = "email" id = "email" name = "email" value = <?= $email?>></center></td>
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
							<td><center><input type = "text" id = "cardno" name = "cardno" value = <?= $cardno?>></center></td>
						</tr>
						<tr>
							<td>Expiration Date: </td>
							<td>
								<center>
									<input type = "text" id = "day" name = "day" value = <?= $day?> size = "4">/
									<input type = "text" id = "month" name = "month" value = <?= $month?> size = "5">/
									<input type = "text" id = "year" name = "year" value = <?= $year?> size = "4">
								</center>
							</td>
						</tr>
						<tr>
							<td>Security Code: </td>
							<td><center><input type = "password" id = "code" name = "code" value = <?= $code?>></center></td>
						</tr>
						<tr>
							<td colspan = 2>
								<center>
									<input type = "button" id = "update" name = "update" value = "Update" onclick = "Check()">
									<input type = "submit" name = "cancel" value = "Cancel">
								</center>
							</td>
						</tr>
					</table>
				</fieldset>
			</center>
		</form>
		
		<script type = "text/Javascript">
			
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

			function Check()
			{
				var name = document.getElementById('name').value.trim();
				var email = document.getElementById('email').value.trim();
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
				else if(!Male.checked && !Female.checked && !Other.checked)
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
					document.getElementById('update').setAttribute('type','submit');
					document.getElementById('update').click();
				}
			}
		</script>
	</body>
</html>
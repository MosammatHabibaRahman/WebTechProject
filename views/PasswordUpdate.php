<?php
	session_start();
	if(!isset($_SESSION['user']['s_id']))
	{
		header("location: Login.php");
	}
?>

<html>
	<head>
		<title>Update Password</title>
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
		<br>
		<br>
		<form method = "POST" action = "../php/Password_Check.php">
            <center>
                <h5 id = "err" style = "color:red;"></h5>
                <fieldset style="width:350px">
                    <legend>Update Password</legend>
                    <table width = 340px>
                        <tr>
                            <td>Current Password: </td>
                            <td><center><input type = "password" id = "current" name = "current" value = ""></center></td>
                        </tr>
                        <tr>
                            <td>New Password: </td>
                            <td><center><input type = "password" id = "new" name = "new" value = ""></center></td>
                        </tr>
                        <tr>
                            <td>Re-Type New Password: </td>
                            <td><center><input type = "password" id = "password_conf" name = "password_conf" value = ""></center></td>
                        </tr>
                    </table>
                    <input type = "button" id = update name = "update" value = "Update" onclick = "Check()"> 
                    <input type = "submit" name = "cancel" value = "Cancel"> 
                </fieldset>
            </center>
		</form>
	</body>
    <script type = "text/javascript">
			
			function Check()
			{
				var current = document.getElementById('current').value.trim();
				var password_conf = document.getElementById('password_conf').value.trim();
				var newpw = document.getElementById('new').value.trim();
				
			    if(current == "")
				{
					document.getElementById('err').innerHTML = "Please enter your password";
				}
                else if(newpw == "")
                {
                    document.getElementById('err').innerHTML = "Please enter a new password";
                }
				else if(password_conf == "")
				{
					document.getElementById('err').innerHTML = "Please confirm your password";
				}
				else if(newpw != password_conf)
				{
					document.getElementById('err').innerHTML = "The passwords do not match, please enter the same password in both fields.";
				}
				else
				{
					document.getElementById('update').setAttribute('type','submit');
					document.getElementById('update').click();
				}
			}
		</script>
</html>
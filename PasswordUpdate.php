<?php
	session_start();
	if(!isset($_SESSION['id']))
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
                <td width = 35px><a href = "Logout.php"><img src = "logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<form method = "POST" action = "Password_Check.php">
            <center>
                <fieldset style="width:350px">
                    <legend>Update Password</legend>
                    <table width = 340px>
                        <tr>
                            <td>Current Password: </td>
                            <td><center><input type = "password" name = "current" value = ""></center></td>
                        </tr>
                        <tr>
                            <td>New Password: </td>
                            <td><center><input type = "password" name = "new" value = ""></center></td>
                        </tr>
                        <tr>
                            <td>Re-Type New Password: </td>
                            <td><center><input type = "password" name = "password_conf" value = ""></center></td>
                        </tr>
                    </table>
                    <input type = "submit" name = "update" value = "Update"> 
                    <input type = "submit" name = "cancel" value = "Cancel"> 
                </fieldset>
            </center>
		</form>
	</body>
</html>
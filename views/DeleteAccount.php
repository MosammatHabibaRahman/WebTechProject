<?php
	session_start();
	if(!isset($_SESSION['user']['s_id']))
	{
		header("location: Login.php");
    }
?>

<html>
    <head>
        <title>Delete Account</title>
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
        <center>
            <form method = "POST" action = "../php/Delete_Check.php">
                <fieldset style="width:350px">
                    <legend>Delete Account</legend>
                    <table width = 340px>
                        <tr>
                            <td colspan = 2><center><b>Are you sure you want to delete your account?</b></center><br></td>
                        </tr>
                        <tr>
                            <td>Type Your Password: </td>
                            <td><center><input type = "password" name = "password" value = ""></center></td>
                        </tr>
                        <tr>
                            <td>Re-Type Your Password: </td>
                            <td><center><input type = "password" name = "password_conf" value = ""></center></td>
                        </tr>
                    </table>
                    <br>
                    <input type = "submit" name = "confirm" value = "Yes, I'm sure"> 
                    <input type = "submit" name = "cancel" value = "No, go back"> 
                </fieldset>
            </form>
        </center>
    </body>
</html>
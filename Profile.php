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
		<title>Profile</title>
	</head>
	<body>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form method = "POST" action = "Profile_Check.php">
            <center>
                <fieldset style="width:350px">
                    <legend>Profile</legend>
                    <table width = 350px>
                    <tr>
                        <td>Username: </td>
                        <td><?= $username ?></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?= $email ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?= $gender ?></td>
                    </tr>
                    <tr>
                        <td>Card No: </td>
                        <td><?= $cardno ?></td>
                    </tr>
                    <tr>
                        <td>Expiration Date: </td>
                        <td><?= $day."/".$month."/".$year ?></td>
                    </tr>
                    <tr>
                        <td>Security Code: </td>
                        <td><?= $code ?></td>
                    </tr>
                </table>
                <br>
                <input type = "submit" name = "back" value = "Back">
                <input type = "submit" name = "updateProfile" value = "Update Profile">
                <input type = "submit" name = "updatePassword" value = "Update Password">
                </fieldset>
            </center>
        </form>
	</body>
</html>
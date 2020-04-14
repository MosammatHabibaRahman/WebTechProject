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
        $propic = $_SESSION['propic'];
        $path = "ProfilePictures/".$propic;

        echo $path;
	}

?>

<html>
	<head>
		<title>Profile</title>
	</head>
	<body>
        <table width = 1010px>
            <tr>
                <td></td>
                <td width = 35px><a href = "Logout.php"><img src = "logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
        <div>
            <center>
                <img src = "<?=$path?>" width = "100" height = "100"/>
                <form method = "POST" action = "ImgUpload.php" enctype = "multipart/form-data">
                    <input type = "file" name = "propic" value = "Upload Picture" style = "width:140px"/>
                    <input type = "submit" name = "submitpic" value = "Submit"/>
                </form>
            </center>
        </div>
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
                <input type = "submit" name = "delete" value = "Delete Account">
                </fieldset>
            </center>
        </form>
	</body>
</html>
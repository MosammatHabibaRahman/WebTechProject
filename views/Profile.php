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
        $path = "../ProfilePictures/".$propic;

        $splitdate = explode('-',$date);
        $expdate = $splitdate[2]."/".$splitdate[1]."/".$splitdate[0];
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
                <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
        <div>
            <center>
                <img src = "<?=$path?>" width = "100" height = "100"/>
                <form method = "POST" action = "../php/ImgUpload.php" enctype = "multipart/form-data">
                    <input type = "file" name = "propic" value = "Upload Picture" style = "width:140px"/>
                    <input type = "submit" name = "submitpic" value = "Submit"/>
                </form>
            </center>
        </div>
        <br>
        <br>
        <form method = "POST" action = "../php/Profile_Check.php">
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
                        <td><?= $expdate ?></td>
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
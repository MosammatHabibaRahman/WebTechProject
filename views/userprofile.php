<?php
session_start();
include("../service/functions.php");
if(!isset($_SESSION['user']['s_id']))
{
  header("location: ../index.php");
  exit;
}
else if($_SESSION['user']['usertype'] != "Basic Student")
{
  header("location: ../index.php");
}
   
  $id = $_SESSION['user']['s_id'];
  $username = $_SESSION['user']['username'];
  $email = $_SESSION['user']['email'];
  $password = $_SESSION['user']['password'];
  $gender = $_SESSION['user']['gender'];
  $cardno = $_SESSION['user']['gender'];
  $expdate = $_SESSION['user']['gender'];
  $code = $_SESSION['user']['gender'];
  $imagepath = "../ProfilePictures/".trim($_SESSION['user']['propic']);

  /* $sql = "SELECT  *  FROM admin where id='$uid'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $id=$row['id'];
      $username=$row['username'];
      $address=$row['address'];
      $password=$row['password'];
      $phoneno=$row['phoneno'];
      $email=$row['email'];
      $image=$row['image'];		 
    }
  } */
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#maincontainer{
	margin-left:100px;
	margin-top:50px;
}
#image{
	 float: left;
}
#information{
	 float: right;
}
#mySidenav a {
    position: absolute;
    left: -80px;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}

#about {
    top: 80px;
    background-color: #4CAF50;
}

#blog {
    top: 160px;
    background-color: #2196F3;
}

#projects {
    top: 240px;
    background-color: #f44336;
}

#contact {
    top: 320px;
    background-color: #555
}
.leftinfo{
	float:left;
	width:200px;
	margin-left:0px;
}
.rightinfo{
	float:right;
	width:300px;
	margin-right:700px;
}
</style>
</head>
<body>

  <div id="mySidenav" class="sidenav">
    <a href="userprofile.php" id="about">Profile</a>
    <a href="yourcourse.php" id="blog">Your courses</a>
    <a href="display.php" id="projects">Courses</a>
    <a href="../php/Logout.php" id="contact">Logout</a>
  </div>                                                                                        

  <div id="maincontainer">
    <h2>Your Profile</h2>
    <div class="image"> 
      <img src="<?=$imagepath?>" height="198" width="200"/>
    </div>
    <br><br><br>
    <!-- <div class="information">
      <div class='leftinfo'>
        <div class='userid'><h3>Your id:</h3>"<?=$id?>"</div><br>
        <div class='username'><h3>your username:</h3>"<?=$username?>"</div><br>
        <div class='address'><h3>Your address:</h3>"<?=$gender?>"</div><br>
      </div>

      <div class='rightinfo'>
        <div class='password'><h3>Your password</h3>"<?=$password?>"</div><br>
        <div class='phoneno'><h3>your phone No</h3>"<?=$cardno?>"</div><br>
        <div class='email'><h3>Your email</h3>"<?=$email?>"</div><br>
      </div>
    </div> -->
    <div class="information">
      <table>
        <tr>
          <td width=200px>
            <div class='userid'><h3>Your id:</h3>"<?=$id?>"</div><br>
            <div class='username'><h3>your username:</h3>"<?=$username?>"</div><br>
            <div class='address'><h3>Your address:</h3>"<?=$gender?>"</div><br>
          </td>
          <td width=200px>
            <div class='password'><h3>Your password</h3>"<?=$password?>"</div><br>
            <div class='phoneno'><h3>your phone No</h3>"<?=$cardno?>"</div><br>
            <div class='email'><h3>Your email</h3>"<?=$email?>"</div><br>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html> 

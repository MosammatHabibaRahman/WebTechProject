<?php

  session_start();
  include("../service/functions.php");
  if(!isset($_SESSION['user']['s_id']))
  {
    header("location: index.php");
    exit;
  }

  $id=$_SESSION['user']['s_id'];
  $result = getStudentCourses($id);
  $course = fetch($result);
?>

<html>
<head>
  <title>display</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
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
  </style>
</head>

<body>
  <center><h2>Your Courses</h2></center>
  <div id="mySidenav" class="sidenav">
    <a href="userprofile.php" id="about">Profile</a>
    <a href="yourcourse.php" id="blog">Your course</a>
    <a href="display.php" id="projects">Courses</a>
    <a href="../php/Logout.php" id="contact">Logout</a>
  </div>
  
  <div id="maincontainer">
    <div class="container">
      <div class="col-lg-12">
        <!-- <table class="table table-striped table-hover table-bordered">
          <tr class="bg-dark text-white">
            <th>Course Name</th>
            <th>No of Classes</th>
            <th>Course Type</th>
            <th>Course Rating</th>
            <th>Course Status</th>
            <th>Course Category</th>
            <th>Lectures</th>
            <th>Delete</th>
          </tr> -->

          <?php
            $print = "";
            if($course != NULL)
            {
                $print = "<table class="."table table-striped table-hover table-bordered".">
                <tr class="."bg-dark text-white".">
                  <th>Course Name</th>
                  <th>No of Classes</th>
                  <th>Course Type</th>
                  <th>Course Rating</th>
                  <th>Course Status</th>
                  <th>Course Category</th>
                  <th>Lectures</th>
                  <th>Delete</th>
                </tr>";

                for($it=0; $it<count($course);$it++)
                {
                    $print .= "<tr>
                    <td><center>{$course[$it]['course_name']}</center></td>
                    <td><center>{$course[$it]['no_of_classes']}</center></td>
                    <td><center>{$course[$it]['course_type']}</center></td>
                    <td><center>{$course[$it]['avg_rating']}</center></td>
                    <td><center>{$course[$it]['status']}</center></td>
                    <td><center>{$course[$it]['category']}</center></td>
                    <td><center><a href=video.php?c_id={$course[$it]['c_id']}</a>View</a></center></td>
                    <td><center><a href=../php/delete.php?c_id={$course[$it]['c_id']}</a>Delete</a></center></td>
                    </tr>";
                }
            }
            else
            {
                $print .= "<tr><td><center>You have not enrolled in any courses yet.</center></td>
                <td><center><a href=BrowseCourse.php>Click here to view the list of offered courses.</a></center></td></tr>";
            }
            echo $print;
        ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
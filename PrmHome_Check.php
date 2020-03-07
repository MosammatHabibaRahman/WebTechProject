<?php
    session_start();
	if(isset($_REQUEST['search']))
	{
        $_SESSION['category'] = $_REQUEST['category'];
        $_SESSION['searchtext'] = $_REQUEST['searchtext'];
        header("location: BrowseCourse.php");
    }
    else if(isset($_REQUEST['search2']))
    {
        $_SESSION['category'] = $_REQUEST['category'];
        $_SESSION['searchtext'] = $_REQUEST['searchtext'];
        header("location: TeacherList.php");
    }
?>
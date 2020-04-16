<?php
    session_start();
	if(isset($_REQUEST['search']))
	{
        $_SESSION['category'] = $_REQUEST['category'];
        $_SESSION['searchtxt'] = $_REQUEST['searchtxt'];
        header("location: BrowseCourse.php");
    }
    else if(isset($_REQUEST['search2']))
    {
        $_SESSION['A-Z'] = $_REQUEST['A-Z'];
        $_SESSION['searchteacher'] = $_REQUEST['searchteacher'];
        header("location: TeacherList.php");
    }
    else if(isset($_REQUEST['cancelprm']))
    {
        header("location: PrmCancel.php");
    }
    else
    {}
?>
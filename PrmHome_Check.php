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
        $_SESSION['A-Z'] = $_REQUEST['A-Z'];
        $_SESSION['searchteacher'] = $_REQUEST['searchteacher'];
        header("location: TeacherList.php");
    }
    else if(isset($_REQUEST['cancelprm']))
    {
        header("location: PrmCancel.php");
    }
    else
    {
        $course_count = $_SESSION['course_count'];
        for($i=0; $i<$course_count; $i++)
        {
            $view = "view".$i;
            if(isset($_REQUEST[$view]))
            {
                $_SESSION['selected_course'] = $_SESSION['usercourse'][$i];
                header("location: Course_View2.php");
            }
        }
    }
?>
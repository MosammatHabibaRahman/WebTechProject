<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: Login.php");
    }
    else
    {
        $c_id = $_SESSION['selected_course'];
        $name = $_SESSION['selected_course_name'];

        $lines = file("VideoList.txt");
        $data = array();
        foreach($lines as $l)
        {
            array_push($data,explode('|',$l));
        }

        $print = "<html><head><title>".$name."</title></head><body><table width = 1010px><tr><td><center><h1>".$name."</h1></center></td><td width = 35px><a href = "."Logout.php"."><img src = "."logout.png"." width = 35px height = 35px></a></td></tr></table><center>";

        for($i=0; $i<count($data); $i++)
        {
            if(trim($data[$i][2]) == $c_id)
            {
                $mp4 = trim($data[$i][0]).".mp4";
                $ogg = trim($data[$i][0]).".ogg";
                $vname = $data[$i][1];
                $print .= "<h3>".$vname."</h3><video width="."640"." height="."480"." controls".">
                        <source src=".".$mp4."." type="."video/mp4".">
                        <source src=".".$ogg."." type="."video/ogg".">
                </video><br><br>";
            }
        }

        $print .= "</center></body></html>";

        echo $print;
    }
?>

<html>
    <body>
        <br>
        <center>
            <form method = "POST" action = "Class_Check.php">
                <input type = "submit" name = "back" value = "Back">
            </form>
        </center>
    </body>
</html>
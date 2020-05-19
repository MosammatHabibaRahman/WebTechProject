<html>
	<head>
		<title>Login</title>
	</head>
	<body>
        <br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<form method = "POST" action = "../php/Log_Check.php">
            <center>
                <h5 id = "err" style = "color:red;"></h5>
                <fieldset style="width:350px">
                    <legend>LOGIN</legend>
                        <table width = 350px>
                            <tr>
                                <td><center>User Name: </center></td>
                                <td><center><input id = "name" type = "text" name = "username" value = ""></center></td>
                            </tr>
                            <tr>
                                <td><center>Password: </center></td>
                                <td><center><input id = "password" type = "password" name = "password" value = ""></center></td>
                            </tr>
                            <tr>
                                <td colspan = 2><center><input type = "button" id = "login" name = "login" value = "Login" onclick = "Check()"></center></td>
                            </tr>
                        </table> 
                </fieldset>
                <h5><i>Don't have an account? <a href = "../LearningField.php"><u>Click here</u></a> to register.</i></h5>
            </center>
		</form>
	</body>
    <script type = "text/javascript">
			
            function Check()
			{
				var uname = document.getElementById('name').value.trim();
                var pwd = document.getElementById('password').value.trim();

                if(uname == "")
				{
					document.getElementById('err').innerHTML = "Please enter a username";
				}
                else if(pwd == "")
				{
					document.getElementById('err').innerHTML = "Please enter a password";
				}
                else
                {
                    document.getElementById('login').setAttribute('type','submit');
                    document.getElementById('login').click();
                }
            }
    </script>
</html>
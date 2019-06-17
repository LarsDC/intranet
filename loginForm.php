<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="dk/public/css/main.css" />
<title>IUM Intranet Login</title>
</head>

<body>
<?php 

	if(isset($_SESSION['error'])){
		echo $_SESSION['error'];
	}
?>
    <div id="login">
        <form action="login.php" method="post">
            <table class="login">
            <tr>
            <td>Username: </td>
            <td><input type="text" name="user" id="user" class="login"/></td>
        </tr>
            <tr>
            <td>Password: </td>
            <td><input type="password" name="pass" id="pass" class="login"/></td>
            </tr>
            <tr>
            <td>
                <input type="reset" name="reset" value="RESET" class="btn" />
            </td>
            <td>
                <input type="submit" name="submit" value="OK!" class="btn" />
            </td>
        </tr>
    </table>
    </form>
    </div>
</body>
</html>
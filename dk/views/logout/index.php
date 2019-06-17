<!DOCTYPE html>
<html><head><meta http-equiv='Refresh' content='1;url=../'>
        <title>Logout</title>
    </head>
    <body>
        <p>You have been logged out!</p>
	</body>
</html>

<?php
	session_destroy();
        $_SESSION['country'];
        $_SESSION['user'];
?>
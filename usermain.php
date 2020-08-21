<?php
session_start();
echo "<h1> Welcome to your account ".$_SESSION['user']."!</h1>";

if(isset($_POST['logout']))
{
	session_destroy();
	header("location:login.php");
}

if (!isset($_SESSION) || !isset($_SESSION['user'])) {
    header("Location:login.php");
}

?>
<html>

<body style="background-color:lightgrey;">
<font size = "5"><a href="">Browse Stocks here</a><br></font><br>

<form action = "usermain.php" method = "post">
<input type = 'submit' name = 'logout' value = 'Log out'>
</form>

</body>
</html>

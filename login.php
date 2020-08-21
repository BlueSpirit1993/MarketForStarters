//MarketForStarters
//login.php
//Version:1.0
//Date Modified: 07/19/2020

<?php
echo "<h1>Login Here</h1>";
if(isset($_POST['login']))
{
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	
	$conn = mysqli_connect("localhost","root","" );
    if(!$conn){ die("connection failed:".mysqli_connect_errno()."=".mysqli_connect_error());
    }
	mysqli_select_db($conn,"users");
	
	$checkQuery = "SELECT * FROM userlist WHERE uId = '$uid' and password = '$pwd'";
	$results = mysqli_query($conn,$checkQuery);
	
	$user = mysqli_fetch_array($results);
	if(($user['uId']==$uid)&&$user['password']= $pwd)
	{
		session_start();
		if($user['type']==1)
		{
			$_SESSION['user']=$user['uId'];
			header("location:adminmain.php");
		}
		if($user['type']==0)
		{
			$_SESSION['user']=$user['uId'];
			header("location:usermain.php");
		}
		if($user['type']==2)
		{
			session_destroy();
			echo "<div><font style='color:red'>Your account has been suspended. Please contact your administrator</font></div>";
		}
	}
	else
	{
		echo "<font color = 'red'>Login failed</font><br>";
	}
}



?>
<html>
<body style="background-color:lightgrey;">

<form action = "login.php" method = "post">

User ID:<input type = 'text' name = 'uid'><br>
Password:<input type = 'text' name = 'pwd'><br>
<input type = 'submit' name = 'login' value = 'Login'><br>
<a href = "register.php">Click here to register if you don't have an account</a>
</form>







</body>
</html>

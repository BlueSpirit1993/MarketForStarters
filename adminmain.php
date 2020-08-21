<?php

session_start();

echo "<h1>Manage User Accounts</h1>";
$conn = mysqli_connect("localhost","root","" );
if(!$conn){ die("connection failed:".mysqli_connect_errno()."=".mysqli_connect_error());
}
mysqli_select_db($conn,"users"); 


if(isset($_POST['newfname']))
{
	$username = $_POST['username1'];
	$fname = $_POST['fname'];
	$sql= "UPDATE userlist SET fname ='$fname' WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Name changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['newlname']))
{
	$username = $_POST['username2'];
	$lname = $_POST['lname'];
	$sql= "UPDATE userlist SET lname ='$lname' WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Name changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['newpassword']))
{
	$username = $_POST['username3'];
	$password = $_POST['password'];
	$sql= "UPDATE userlist SET password ='$password' WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Password changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['newemail']))
{
	$username = $_POST['username4'];
	$email = $_POST['email'];
	$sql= "UPDATE userlist SET email ='$email' WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Email changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['newO']))
{
	$username = $_POST['username7'];
	$occupation = $_POST['occupation'];
	$sql= "UPDATE userlist SET occupation ='$occupation' WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Occupation changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['newA']))
{
	$username = $_POST['username8'];
	$address = $_POST['address'];
	$sql= "UPDATE userlist SET address ='$address' WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Address changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['sa']))
{
	$username = $_POST['username5'];
	$sql= "UPDATE userlist SET type = 2 WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Account suspended successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['usa']))
{
	$username = $_POST['username6'];
	$type = 0;
	$sql= "UPDATE userlist SET type = 0 WHERE uid = '$username'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Account suspension removed changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
}

if(isset($_POST['logout']))
{
	$user = $_SESSION['user'];
	$currenttime = time();
	$sql= "UPDATE userlist SET logout ='$currenttime' WHERE uId = '$user'";
	if (mysqli_query($conn, $sql) !== FALSE) echo "<div><font color = 'green'>Price changed successfully</font></div>"; else echo "<div><font color = 'red'>Error in updating: " . mysqli_error($conn)."</font></div>";	
	session_destroy();
	header("location:login.php");
}

if(isset($_POST['return']))
{
	header("location:adminmain.php");
}
 /*if (!isset($_SESSION) || !isset($_SESSION['user'])){
         header("Location:login.php");
  }*/



?>
<html>
<body style="background-color:lightgrey;">


<form action = "adminmain.php" method = "post">
<b>Enter account username to update account first name:</b>
<input type="text"  name ="username1"/>
<b>Enter new first name:&nbsp;</b>
<input type="text"  name ="fname" pattern="[A-Za-z]+" />
<input type="submit" value="Change Name"  name ="newfname">
</form>
	
<form action = "adminmain.php" method = "post">
<b>Enter account username to update account last name:</b>
<input type="text"  name ="username2"/>
<b>Enter new last name:&nbsp;</b>
<input type="text"  name ="lname" pattern="[A-Za-z]+" />
<input type="submit" value="Change Name"  name ="newlname">
</form>
	
<form action = "adminmain.php" method = "post">
<b>Enter account username to update password:</b><input type="text"  name = "username3" />
<b>Enter new password:&nbsp;</b>
<input type="text"  name = "password" />
<input type="submit" value="Change Password"name = "newpassword">
</form>
	
<form action = "adminmain.php" method = "post">
<b>Enter account username to update email:</b>
<input type="text" name = "username4"/>
<b>Enter new email:&nbsp;</b>
<input type="email"  name = "email" />
<input type="submit" value="Change Email"name = "newemail">
</form>
	
<form action = "adminmain.php" method = "post">
<b>Enter account username to update occupation:</b>
<input type="text" name = "username7"/>
<b>Enter new occupation:&nbsp;</b>
<input type="text"  name = "occupation" />
<input type="submit" value="Change occupation"name = "newO">
</form>
	
<form action = "adminmain.php" method = "post">
<b>Enter account username to update address:</b>
<input type="text" name = "username8"/>
<b>Enter new address:&nbsp;</b>
<input type="text"  name = "address" />
<input type="submit" value="Change Address"name = "newA">
</form>

<form action = "adminmain.php" method = "post">
<b>Enter account username to suspend account:</b>
<input type="text"  name = "username5"/>
<input type="submit" value="Suspend Account" name ="sa">
</form>

<form action = "adminmain.php" method = "post">
<b>Enter account username to unsuspend an account:</b>
<input type="text"  name = "username6"/>
<input type="submit" value="Unsuspend Account" name ="usa">
</form>
	

<form action = "adminmain.php" method = "post">
<input type="submit" value="Logout" name = "logout"/>
</form>

</body>
</html>

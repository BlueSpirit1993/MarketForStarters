//MarketForStarters
//register.php
//Version:1.0
//Date Modified: 07/19/2020
<?php
$conn = mysqli_connect("localhost","root","" );
if(!$conn){ die("connection failed:".mysqli_connect_errno()."=".mysqli_connect_error());
}

mysqli_select_db($conn,"users"); 

 
 if(isset($_POST['register']))
{
	$uid =$_POST['uid'];	
	$pwd = $_POST['pwd'];
	$fname = $_POST['fname'];	
	$lname = $_POST['lname'];	
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$occupation = $_POST['occupation'];
	$dOb = $_POST['dOb'];
	$type=0;
 $sql = "INSERT INTO userlist(uId,password,fname,lname,email,gender,address,occupation,dob,type)VALUES('$uid','$pwd','$fname','$lname','$email','$gender','$address','$occupation','$dOb','$type')";
 if (mysqli_query($conn, $sql))
	echo "<div><font color='green'>Registration successfull!</font></div>";
 else 
	 echo "<div><font color='red'>User ID already exists</font></div>"; 
}


?>
<html>
<body style="background-color:lightgrey;">
<h1>Register Here</h1>
<form action = "register.php" method = "post">

User ID:<input type = 'text' name = 'uid'><br>
Password:<input type = 'text' name = 'pwd'><br>
First Name:<input type = 'text' name = 'fname'><br>
Last Name:<input type = 'text' name = 'lname'><br>
E-mail:<input type = 'text' name = 'email'><br>
Gender:<input type = 'text' name = 'gender'><br>
Address:<input type = 'text' name = 'address'><br>
Occupation:<input type ='text' name = 'occupation'><br>
Date of Birth<input type ='text' name = 'dOb'><br>
<input type = 'submit' name = 'register' value = 'Register'><br>
</form>
<font size = "5"><a href = "login.php">Click here to Login</a></font><br>









</body>
</html>

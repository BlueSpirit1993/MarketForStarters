//test
<?php
$conn = mysqli_connect("localhost","root","" );
if(!$conn){ die("connection failed:".mysqli_connect_errno()."=".mysqli_connect_error());
}
$sql = "CREATE DATABASE users";
if(mysqli_query($conn,$sql)){
	echo "Database created successfully<br>";
}else{
echo "Error creating database: ".mysqli_error($conn)."<br>";}

mysqli_select_db($conn,"users"); 

$sql= "CREATE TABLE UserList( uId VARCHAR(20) PRIMARY KEY, password VARCHAR(20) NOT NULL, fname VARCHAR(30) NOT NULL, lname VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, gender VARCHAR(10) NOT NULL, address VARCHAR(1000) NOT NULL, occupation VARCHAR(20) NOT NULL, dOb VARCHAR(20) NOT NULL, type VARCHAR(1) NOT NULL)"; 
if (mysqli_query($conn, $sql))
	echo "Table UserList successfully<br>";
 else echo "Error creating table: " . mysqli_error($conn)."<br>"; 
 
  $adminId = "root";
 $adminpwd = "root";
 $sql = "INSERT INTO userlist(uId,password,fname,lname,email,gender,address,occupation,dob,type)VALUES('$adminId','$adminpwd','na','na','na','n','na','na','na',1)";
if (mysqli_query($conn, $sql))
	echo "Value inserted successfully<br>";
 else echo "Error creating admin: " . mysqli_error($conn)."<br>"; 
?>
<html>
<body style="background-color:lightgrey;">

<font size = "5"><br><a href = "login.php">Click here to go to the login page</a></font>

</body>
</html>

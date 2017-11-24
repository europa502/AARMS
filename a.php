<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style> 
body {
    background: url("a.jpg");
    background-size: 1600px 800px;
    background-repeat: no-repeat;
    padding-top: 40px;
}
</style>
<title>AARMS</title>
</head>
<body style="background-color:powderblue;">

<h1 style="color:RED;background-color:ORANGE">
<center>AUTOMATED ATTENDANCE REPORT MANAGEMENT SYSTEM</center></h1>
<p  style="font-size:320%;"><CENTER>The project to which this document is intended for is Attendance Report System(ARS). The project is meant to reduce the manual work at institutes and education centers. Every kind of tasks and queries can be performed by the system such as marking their presence in every period every day, calculating current percentage of their presence,  in an automated way. 
</CENTER></p>


<form method='post'>
 
  <CENTER>      ID:<input type="text" name="name"></CENTER><br>
<CENTER> 
<select name="DESIGNATION">
  <option value="nothing"> ---</option>
  <option value="professor">PROFESSOR</option>
  <option value="officestaff">OFFICE STAFF</option>
 
  
</select><br>
<p>                                         </p>
</CENTER>
<CENTER> password:<input type="password" name="password"></CENTER><br> 
 <center><input type="submit" value="Submit">  
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "europa";
$dbname = "OATS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else

$type = htmlentities($_POST['DESIGNATION']);
$uid = htmlentities($_POST['name']);
$password = htmlentities($_POST['password']);
if ($type=="professor")
	$database="prof_login";
else if ($type=="officestaff")
	$database="staff_login";
if ($uid1!='');
{$sql = "select uid,password,dept from $database where uid='$uid' and password='$password';";

$conn->query($sql);
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$dept=$row['dept'];
//echo $dept . "hello";
$_SESSION["dept"]=$dept; 
$_SESSION["pass"]=$row['password'];
//echo $row['uid'];
//echo $row['pass'];
if ($uid != "")
{if ($row['uid'] ==$uid and $row['password']==$password) 
   { if($type=="officestaff")
        header('refresh:1;act.php');
    else if ($type=="professor")
        header('refresh:1;tv.php');
   }  
else 
	 
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
  

   
?> 

</body>
</html>

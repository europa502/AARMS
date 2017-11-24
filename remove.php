<?php
session_start();
?>
<html>
<head>
<style> 
body {
    background: url("b.jpg");
    background-size: 1600px 800px;
    background-repeat: no-repeat;
    padding-top: 40px;
}
</style>
<title>student remove</title>
</head>
<body style="background-color:powderblue;">

<h1 style="color:RED;">
<center>STUDENT REMOVE</center></h1>

<form method="post">
 
  <CENTER>      ADMISSION NO:<input type="text" name="name"></CENTER><br>

<CENTER>        Password:   <input type="password" name="password"></CENTER><br> 
 <center><input type="submit" value="REMOVE" >   
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
$branch=$_SESSION["dept"];
//echo $branch;
$branchs=$_SESSION["dept"] . "S";
//echo $branchs;
$uid = htmlentities($_POST['name']);
$branchat=$branch . "at";
//echo $branchat;
$password = htmlentities($_POST['password']);
if ($uid!="")
{if ($password==$_SESSION["pass"])
	
        { $sql = "delete from $branchs where sid='$uid';";
	  $sql1= "delete from $branchat where sid='$uid';";
	  $result=$conn->query($sql);
	  $result1=$conn->query($sql1);
	  if (!$result and !$results1)
	   {	echo  $sql1 . "<br>" . $conn->error;
    		echo "cannot delete";
	    }  
	  else echo "deleted record $uid";
        }
} 
$conn->close();
  

   
?> 
</body>
</html>

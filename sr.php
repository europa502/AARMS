<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>student registeration</title>

<!-- CSS -->
<style>
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 30em;
padding: 1em;
border: 1px solid #ccc;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm label {

display: block;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="datetime-local"],
.myForm select,
.myForm textarea {
float: right;
width: 60%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm input[type="radio"],
.myForm input[type="checkbox"] {
margin-left: 40%;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-left: 40%;
margin-top: 1.8em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}
</style>

</head>
<body>

<form class="myForm" method="post" enctype="" action="">
<strong>You can only add Students belonging to the Dept. you belong.<strong>
<p>
<label>Name
<input type="text" name="name" required>
</label> 
</p>
<p>
<label>Fathers Name
<input type="text" name="fname" required>
</label> 
</p>
<p>
<label>Admission no.
<input type="text" name="admno" required>
</label> 
</p>
<p>
<label>Roll number
<input type="text" name="roll" required>
</label> 
</p>
<p>
<label>Phone 
<input type="tel" name="phone_number">
</label>
</p>

<p>
<label>Email 
<input type="email" name="email">
</label>
</p>

<fieldset>

</fieldset>

<fieldset>
<legend>Extras</legend>
<p><label class="choice"> <input type="radio" name="extras" value="baby"> Hosteler </label></p>
<p><label class="choice"> <input type="radio" name="extras" value="wheelchair"> Day Scholar </label></p>

</fieldset>

<p>
<label>Admission Date
<input type="datetime-local"  required>
</label>
</p>
	

</p>





<p>
<label>Special Instructions
<textarea name="comments" maxlength="500"></textarea>
</label>
</p>

<p><button href="sr.php">Submit</button></p>

</form>
<?php
$branch=$_SESSION["dept"] . "S";
$branchat=$_SESSION["dept"] . "at";
$servername = "localhost";
$username = "root";
$password = "europa";
$dbname = "OATS";
$name=htmlentities($_POST['name']);
$admno=htmlentities($_POST['admno']);
$roll=htmlentities($_POST['roll']);
//$branch=htmlentities($_POST['branch']);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo $branchat;
if ($name != "")
{$sql= "insert into $branch values ($admno,'$name',$roll); ";
 $sql1="insert into $branchat values($admno,0,0,0);";
 $result=$conn->query($sql);
 $result1=$conn->query($sql1);
 if (!$result)
	{echo "Error: " . $sql . "<br>" . $conn->error;
	  if ($result1) 
           echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
 }  
$conn->close();
?>
</body>
</html>

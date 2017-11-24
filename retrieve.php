 
<?php
session_start();
?>
<?php
//$branch=$_COOKIE['dept'];
//$_COOKIE['dept']=$branch; 
$branch=$_SESSION["dept"];
$branchs=$_SESSION["dept"] . "S";
//echo $branch;
// pass the branch value from teachers entry
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

$sql = "SELECT sid, name, roll FROM $branchs ;";

$result = $conn->query($sql);
$num_rows=mysqli_num_rows($result);
$att_branch=$branch . "at";
if ($num_rows > 0) {
    // output data of each row
echo "<form  method='post'>" ;
echo "<table>";
    while($row = $result->fetch_assoc()) {
       
	 
   	 echo "<tr>";
	echo("<td>" ."Admission no.". "</td>");
	echo("<td>" ."Name". "</td>");
	echo("<td>" ."Roll no.". "</td>");
	echo("<td>" ."Mark attendance". "</td>");
 	echo "</tr>";
	echo "<tr>";
  	  for($j=0; $j<=$num_rows; $j++) {
    	    $row = mysqli_fetch_array($result);
    	    if ($row) {
	    $sid=$row['sid'];
            $sql2="update $att_branch set maxdays=maxdays+1 where sid=$sid;";
	    $result2 = $conn->query($sql2);
	    echo("<td>" .$row['sid']. "</td>");
	    echo("<td>" .$row['name']. "</td>");  
	    //$id=$row['id'];
	    echo("<td>" .$row['roll'] ."</td>");
	
            echo "<td> <input type='checkbox' name='checkbox[]' value='$sid'> </td>";
    		}
         echo "</tr>";
}
echo "</table>";
echo "<br>";
echo "<br>";
$checked_arr = $_POST['checkbox'];
$count = count($checked_arr);
echo "There are ".$count." student(s) present";
echo "<br>";
echo "<input type='submit' name='submit' value='submit' />";

foreach ($_POST['checkbox'] as $checked_ar)
{	
	$sql1="update $att_branch set attend=attend+1  where sid=$checked_ar; ";
	$result1 = $conn->query($sql1);	
	 
}
//echo "<input type='checkbox' name='checkbox1' value='1'>Confirm";
$sql3="select sid,marks,attend,maxdays from $att_branch";
$result3 = $conn->query($sql3);
$num_rows3=mysqli_num_rows($result3);

echo "</form>";
    }
 
  for($j=0; $j<=$num_rows3; $j++) 		 
   {        
      	
	$row = mysqli_fetch_array($result3);
	if ($row) 
	 { 
	    $sid=$row['sid'];
	    //echo $sid;
	    //echo $row['marks'];
	    $marks=$row['marks'];
	    $marks=floatval($marks);
	    //echo $marks;
	    $attend=$row['attend'];
	    //echo $attend;
	    $maxdays=$row['maxdays'];
	    //echo $maxdays;
	    $marks=($attend/$maxdays)*5;
            $sql4="update $att_branch set marks=$marks where sid=$sid;";
	    $result4 = $conn->query($sql4);
	    echo "\n";
	  }
}
} else {
    echo "0 results";
}
$conn->close();
?> 

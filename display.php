 
<?php
session_start();
$branch=$_SESSION['dept'];
//echo $branch;
$branchs=$_SESSION['dept'] . "S";
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
$branchat=$branch . "at";
$sql = "SELECT name, roll, attend, marks FROM $branchs,$branchat where $branchs.sid=$branchat.sid ;";

$result = $conn->query($sql);
if (!$result)
echo "error";
$num_rows=mysqli_num_rows($result);
//echo $num_rows;
if ($num_rows > 0) {
    // output data of each row
echo "<form  method='post'>" ;
echo "<table>";
    while($row = $result->fetch_assoc()) {
       
	 
   	 echo "<tr>";
	  echo("<td>" ."Roll no.". "</td>"); 
	  echo("<td>" ."Name". "</td>"); 
	  echo("<td>" ."Attendance". "</td>"); 
	  echo("<td>" ."Marks". "</td>"); 
	echo "</tr>";
	echo "<tr>";
  	  for($j=0; $j<=$num_rows; $j++) {
    	    $row = mysqli_fetch_array($result);
    	    if ($row) {
            
	    //echo("<td>" .$row['id']. "</td>"); 
 	    echo("<td>" .$row['roll']. "</td>"); 
 	    echo("<td>" .$row['name']. "</td>"); 
 	    echo("<td>" .$row['attend']. "</td>"); 
	    echo("<td>" .$row['marks']. "</td>"); 
    		}
           echo "</tr>";
}
echo "</table>";
echo "</form>";
    }

} else {
    echo "0 results";
}
$conn->close();
?> 

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
<title>view</title>
</head>
<body style="background-color:powderblue;">

<h1 style="color:RED;">
<center>ACTIVITY</center></h1>

<form method="post">
 
  
<CENTER> 
<select name="OPERATION">
  <option value="nothing"> ---</option>
  <option value="TAKE ATTENDANCE">TAKE ATTENDANCE</option>
  <option value="VIEW ATTENDANCE">VIEW ATTENDANCE</option><br>
  
</select><br>
<p>                                         </p>
</CENTER>
 <center><input type="submit" value="Submit" >   </center> 
</form>
    
    <?php
        
        $type_attendance = htmlentities($_POST['OPERATION']);
        if($type_attendance!='nothing'){
        if($type_attendance=='TAKE ATTENDANCE')
            header('refresh:1;retrieve.php');
        else if($type_attendance=='VIEW ATTENDANCE')
            header('refresh:1;display.php');
        }
    ?>
</body>
</html>

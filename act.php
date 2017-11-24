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
<title>activity</title>
</head>
<body style="background-color:powderblue;">

<h1 style="color:RED;">
<center>ACTIVITY</center></h1>

<form method="post">
 
  
<CENTER> 
<select name="OPERATION">
<option  > ---</option>
  <option value="add">ADD STUDENT</option>
  <option value="remove">REMOVE STUDENT</option><br>
  
</select><br>
<p>                                         </p>
</CENTER>
 <center><input type="submit" value="Submit" >   </center> 
</form >
    
    <?php
        
        $type_student = htmlentities($_POST['OPERATION']);
	//echo $type_student;
         
        if($type_student=='add')
            {//echo "done";
	    header('refresh:1;sr.php');}
        else if($type_student=='remove')
            header('refresh:1;remove.php');
        
    ?>
</body>
</html>

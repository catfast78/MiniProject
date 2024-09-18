 <?php
 $Server="localhost";
 $User="root";
 $Password="";
 $DB="miniproject";
 $con=mysqli_connect($Server,$User,$Password,$DB);
 if(!$con)
 { 
 echo "Not connected";
 }
 
 ?>
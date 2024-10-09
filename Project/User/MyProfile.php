<?php

session_start();
include("Head.php");


include("../Assets/Connection/Connection.php");





	$selQry="select * from tbl_user where user_id='".$_SESSION["aid"]."'";
  	$result= $con->query($selQry);
  	$data=$result->fetch_assoc();
 		

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="UserHome.php">Home</a>
<hr>
<div align="center">
<h3>MyProfile</h3>
<table width="200" border="1" align="center">
<tr>
      <td colspan="2" align="center"><img src="../Assets/Files/Users/<?php echo $data["user_photo"]; ?>" width="100"/></td>
</tr>
  <tr>
    <td width="74">Name</td>
    <td width="110"><?php echo $data["user_name"] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data["user_email"] ?></td>
  </tr>
  <tr> 
    <td colspan="2" align="center">
    <a href="EditProfile.php">EditProfile</a>/<a href="ChangePassword.php">ChangePassword</a>
    
    </td>
   
  </tr>
</table>
</div>
</body>
</html>
<?php
include("Foot.php")
?>
<?php

include("../Assets/Connection/Connection.php");

session_start();




	$selQry="select * from tbl_user where user_id='".$_SESSION["aid"]."'";
  	$result= $con->query($selQry);
  	$data=$result->fetch_assoc();
	
	
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txtname"];
	$email=$_POST["txtemail"];
	
	
	$insQry ="update tbl_user set user_name='".$name."',user_email='".$email."' where user_id='".$_SESSION["aid"]."'";
     if($con->query($insQry))
	 {
		 
			header("location:MyProfile.php");
	 }
}
 		

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="UserHome.php">Home</a>
<hr />
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1" align="center">
  <tr>
    <td width="74">Name</td>
    <td width="110"><input type="text" name="txtname" value="<?php echo $data["user_name"] ?>" /></td>
  </tr>
  <tr>
    <td>Email</td>
     <td width="110"><input type="text" name="txtemail" value="<?php echo $data["user_email"] ?>" /></td>
    
  </tr>
  <tr> 
    <td colspan="2" align="center">
    <input type="submit" name="btn_submit" id="btn_submit" value="Update" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
    
    </td>
   
  </tr>
</table>
</form>
</body>
</html>
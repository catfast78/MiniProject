
<?php

include("../Assets/Connection/Connection.php");

session_start();



$message="";
	
	
	
if(isset($_POST["btnupdate"]))
{
	$current=$_POST["txtcurrent"];
	$newpwd=$_POST["txtnew"];
	$confirm=$_POST["txtconfirm"];
	
	$selQry="select * from tbl_user where user_id='".$_SESSION["aid"]."' and user_password='".$current."'";
  	$result= $con->query($selQry);
  	if($data=$result->fetch_assoc())
	{
		if($newpwd==$confirm)
		{
			
			$insQry ="update tbl_user set user_password='".$confirm."' where user_id='".$_SESSION["aid"]."'";
     		if($con->query($insQry))
	 		{
					header("location:MyProfile.php");
	 		}
		}
		else
		{
				$message="Password not same...";
		}
	}
	else
	{
				$message="Please check old password...";
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
<form id="form1" name="form1" method="post" action="">
  <table width="391" height="185" border="1" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txtcurrent"></label>
      <input type="text" name="txtcurrent" id="txtcurrent" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnew"></label>
      <input type="text" name="txtnew" id="txtnew" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txtconfirm"></label>
      <input type="text" name="txtconfirm" id="txtconfirm" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><?php echo $message?></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php

include("../Assets/Connection/Connection.php");

session_start();

$messge="";

if(isset($_POST["btn_submit"]))
{
	
	$selQry="select * from tbl_admin where admin_email='".$_POST["txt_email"]."' and admin_password='".$_POST["txt_pwd"]."'";
  	$result= $con->query($selQry);
	$user="select * from tbl_user where user_email='".$_POST["txt_email"]."'and user_password='".$_POST["txt_pwd"]."'";
	$resUser=$con->query($user);
	$salon="select * from tbl_salon where salon_email='".$_POST["txt_email"]."'and salon_password='".$_POST["txt_pwd"]."'";
	$resSalon=$con->query($salon);
  	if($data=$result->fetch_assoc())
  	{
			$_SESSION["adminid"]=$data["admin_id"];
			$_SESSION["adminname"]=$data["admin_name"];
			header("location:../Admin/HomePage.php");
	}
	else if($data=$resUser->fetch_assoc())
		{
			$_SESSION['aid']=$data['user_id'];
			$_SESSION['uname']=$data['user_name']; 
			header("location:../User/UserHome.php");	
		}
	else if($data=$resSalon->fetch_assoc())
		{
			$_SESSION['sid']=$data['salon_id'];
			$_SESSION['sname']=$data['salon_name']; 
			header("location:../Salon/SalonHome.php");	
		}
	else
	{
			$messge="Invalid Login...";
	}
}
			

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<h1 align="center">Login Form</h1>
<form id="form1" name="form1" method="post" action="">


  <table width="200" border="1" align="center">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input  type="email" name="txt_email" id="txt_email" required="required" placeholder="Enter Email"  /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pwd"></label>
      <input required type="password" name="txt_pwd" id="txt_pwd"  placeholder="Enter Password"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><?php echo $messge?></td>
    </tr>
    <tr><td>
    <a href="userRegistration.php">Sign up</a></td>
    <td><a href="Salon.php">Salon Registration</a></td>
    </tr>
  </table>
</form>
</body>
</html>
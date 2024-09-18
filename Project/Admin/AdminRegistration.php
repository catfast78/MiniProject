<?php
include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$pwd=$_POST["txt_pwd"];
	
	$insQry ="insert into tbl_admin(admin_name,admin_email,admin_password) values('".$name."','".$email."','".$pwd."')";
     if($con->query($insQry))
	 {
		 
	 echo "inserted";	
	 }
}

if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_admin where admin_id=".$did;
	if($con->query($delQry))
	{
		header("loaction:AdminRegistration.php");
		
		
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
<div align="center">
<h1>Registration</h1>

<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name2"></label>
      <input type="text" name="txt_name" id="txt_name2" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pwd"></label>
      <input type="text" name="txt_pwd" id="txt_pwd" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" />
      </div></td>
    </tr>
   
  </table>
</form>
<table width="200" border="1">
  <tr>
    <td>SINo.</td>
    <td>Name</td>
    <td>Email</td>
    <td>Password</td>
    <td>Action</td>
  </tr>
  <?php
  $selQry="select * from tbl_admin";
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["admin_name"]; ?> </td>
    <td><?php echo $data["admin_email"]; ?></td> 
    
    <td><?php echo $data["admin_password"]; ?></td>
    <td><a href="AdminRegistration.php?did=<?php echo $data["admin_id"];?>">Delete </td>
  </tr>
  <?php
  }
  ?>
</table>
</div>
</body>
</html>
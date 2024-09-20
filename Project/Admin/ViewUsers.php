<?php
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_GET["did"]))
{
	$did=$_GET["did"];
    $delQry="delete from tbl_user where user_id=".$did;
	if($con->query($delQry))
	{
		//header("loaction:ViewSalon.php");
		
		
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
<a href="HomePage.php">HOME</a>
<hr />
<form id="form1" name="form1" method="post" action="">

  <table width="200" border="1">
    <tr>
      <td>SI.No.</td>
      <td>Name</td>
      <td>email</td>
       
       <td>Proof</td>
      <td>Action</td>
    </tr>
    
      <?php
  $selQry="select * from tbl_user ";
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["user_name"]; ?> </td>
    <td><?php echo $data["user_email"]; ?></td> 
    <td colspan="2" align="center"><img src="../Assets/Files/Users/<?php echo $data["user_photo"]; ?>" width="100"/></td>     
      
      
 
    <td><a href="ViewUsers.php?did=<?php echo $data["user_id"];?>">Remove</a>
     
  </tr>
  <?php
  }
     ?>  
   
  </table>
  
</form>
</body> 
</html>
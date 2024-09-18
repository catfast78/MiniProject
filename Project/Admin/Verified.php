  <?php
include("../Assets/Connection/Connection.php");
session_start();


if(isset($_GET["did"]))
{
	$aid=$_GET["did"];
    $UpQry="delete from tbl_salon where salon_id=".$did;
	if($con->query($UpQry))
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
<a href="HomePage.php">HOME</a>   <a href="ViewSalon.php">Unverified</a>
<hr />

<form id="form1" name="form1" method="post" action="" >
<div id="search" align="center">
<h3>Salons</h3>
  <table width="200" border="1" >
    <tr>
      <td>SI.No.</td>
      <td>Name</td>
      <td>email</td>
      <td>address</td>
      
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    
      <?php
  $selQry="select * from tbl_salon where salon_status=1";
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["salon_name"]; ?> </td>
    <td><?php echo $data["salon_email"]; ?></td> 
    <td><?php echo $data["salon_address"]; ?></td> 
     
      
    <td><?php echo $data["salon_photo"]; ?></td> 
    <td><?php echo $data["salon_proof"]; ?></td> 
 
    <td><a href="Verified.php?did=<?php echo $data["salon_id"];?>">Remove </td>
     
  </tr>
  <?php
  }
     ?>  
   </form>
</body> 
</html>
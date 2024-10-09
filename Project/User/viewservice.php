<?php
ob.start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>SI.No.</td>
      <td>Name</td>
      <td>Details</td>
      <td>Price</td>
      <td>Action</td>
    </tr>
     <tr>
   <?php
  $selQry="select * from tbl_service where salon_id=".$_GET['did'];
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["service_name"]; ?> </td>
    <td><?php echo $data["service_details"]; ?></td> 
    
    <td><?php echo $data["service_price"]; ?></td>
    <td><a href="booking.php?did=<?php echo $data["service_id"];?>">Book </td>
  </tr>
  <?php
  }
  ?>
  </tr> 
  </table>
</form>
</body>
</html>
<?php
ob.flush();
include("Foot.php");
?>

<?php
include("Head.php");
session_start();

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
      <td>Date</td>
      <td>Time</td>
      <td>Service</td>
      <td>Price</td>
      <td>User</td>
      <td>#</td>
    </tr>
    <tr>
    <?php
  	
  $selQry="select * from tbl_booking b inner join tbl_user u on b.user_id=u.user_id inner join tbl_service s on b.service_id=s.service_id where s.salon_id=".$_SESSION['sid'];
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["booking_date"]; ?> </td>
    <td><?php echo $data["booking_time"]; ?></td>
     <td><?php echo $data["service_name"]; ?></td> 
    <td><?php echo $data["booking_amount"]; ?></td>
     <td><?php echo $data["user_name"]; ?></td>
     
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
include("Head.php");
?>

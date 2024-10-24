<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div id="search">
  <table width="200" border="1">
    <tr>
      <td>SI.No</td>
      <td>Content</td>
      <td>Status</td>
      <td>Reply</td>
      
      <td>Date</td>
      <td>user</td>
      <td>Action</td>
    </tr>
    
      <?php
  $selQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id ";
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["complaint_content"]; ?> </td>
    <td><?php echo $data["complaint_status"]; ?></td> 
    <td><?php echo $data["complaint_reply"]; ?></td>   
    <td><?php echo $data["complaint_date"]; ?></td> 
    <td><?php echo $data["user_name"]; ?></td> 
    <td> <a href="Reply.php?did=<?php echo $data["complaint_id"];?>">Reply</a></td>
 
    
     
  </tr>
  <?php
  }
     ?>  
   
  </table>
  </div>

</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>
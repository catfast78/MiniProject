<?php include("Head.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<form id="form1" name="form1" method="post" action="">
<div id="search">
<h3>Unverified</h3>
  <table width="200" border="1">
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
  $selQry="select * from tbl_salon where salon_s=0";
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
 
    <td><a href="Reject.php?did=<?php echo $data["salon_id"];?>">Reject<a href="V.php?cid=<?php echo $data["salon_id"];?>">Accept</td>
     
  </tr>
  <?php
  }
     ?>  
   
  </table>
</form>

<body>
</body>
</html>
<?php include("Foot.php"); ?>

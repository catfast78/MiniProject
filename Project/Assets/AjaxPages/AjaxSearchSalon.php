<?php
include("../Connection/Connection.php");

?>

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
  $selQry="select * from tbl_salon where salon_place=".$_GET['did'];
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
     
      
    <td><img src="../Assets/Files/salon/photo/<?php echo $data["salon_photo"]; ?>" width="50"/></td> 
    <td><img src="../Assets/Files/salon/Proof/<?php echo $data["salon_proof"]; ?>" width="50" /></td> 
 
 
    <td><a href="viewservice.php?did=<?php echo $data["salon_id"];?>">Services<a href="complaint.php?cid=<?php echo $data["salon_id"];?>">Complaints</td>
  </tr>
  <?php
  }
     ?>  
   
  </table>
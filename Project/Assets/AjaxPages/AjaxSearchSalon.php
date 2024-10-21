<?php
include("../Connection/Connection.php");

?>

<div class="container search-table">
  <form id="form1" name="form1" method="post" action="">
    <div id="search">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">SI. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Photo</th>
            <th scope="col">Proof</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    
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
 
 
    <td><a href="viewservice.php?did=<?php echo $data["salon_id"];?>" class="btn btn-sm btn-primary">Services<a href="complaint.php?cid=<?php echo $data["salon_id"];?>" class="btn btn-sm btn-danger">Complaints</td>
  </tr>
  <?php
  }
     ?>  
   
   </tbody>
      </table>
    </div>
  </form>
</div>
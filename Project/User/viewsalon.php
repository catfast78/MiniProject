<?php
ob_start();
include("Head.php");


include("../Assets/Connection/Connection.php");
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!-- <a href="UserHome.php">HOME</a> -->
<hr />
<form >
<table border="1">
<tr><td>District</td>



 <td><label for="sel_district"></label>
      <select name="sel_district"  onchange="getPlace(this.value)" id="sel_district">
      <option>--select--</option>
      <?php
		$selQry1="select* from tbl_district";
		$resultOne=$con->query($selQry1);
		while($data=$resultOne->fetch_assoc())
		{
			?>
      <option value="<?php echo $data["district_id"]?>"  >
            <?php echo $data["district_name"]?> </option>
        
        <?php }
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
      <select name="sel_place" id="sel_place" onchange="getSalon(this.value)">
      <option>--select--</option>
     
      </select></td>
</tr>

</table>
</form>
<form id="form1" name="form1" method="post" action="">
<div id="search">
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
  $selQry="select * from tbl_salon ";
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
  </div>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }
  
  
   function getSalon(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearchSalon.php?did=" + did,
      success: function (result) {

        $("#search").html(result);
      }
    });
  }

</script>
</html>
<?php
ob_flush();
include("Foot.php");
?>

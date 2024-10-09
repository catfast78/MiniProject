<?php
include("Head.php");


session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$details=$_POST["txt_details"];
	$price=$_POST["txt_price"];
	 
	
	$insQry ="insert into tbl_service(service_name,service_details,service_price,salon_id	) values('".$name."','".$details."','".$price."','".$_SESSION['sid']."' )";
     if($con->query($insQry))
	 {
		 
	 echo "inserted";	
	 }
}

 if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_service where service_id=".$did;
	if($con->query($delQry))
	{
		header("loaction:service.php");
		
		
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
      <input type="text" name="txt_details" id="txt_details" /></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>


<table border="1">
 <tr>
  <th>SI.No.</th>
  <th>Name</th>
  <th>Details</th>
  <th>Price</th>
  <th>Action</th>
  </tr>
   <tr>
   <?php
  $selQry="select * from tbl_service where salon_id=".$_SESSION['sid'];
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
    <td><a href="service.php?did=<?php echo $data["service_id"];?>">Delete </td>
  </tr>
  <?php
  }
  ?>
  </tr> 
</table>
</body>
</html>
<?php include("Foot.php");
?>


<?php
include("Head.php");

include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btn_submit"]))
{   $district=$_POST["sel_district"];
	$pname=$_POST["txt_pname"];
	$pcode=$_POST["txt_pcode"];
	 
	
	$insQry ="insert into tbl_place( district_id,place_name,place_pincode) values( '".$district."','".$pname."','".$pcode."')";
     if($con->query($insQry))
	 {
		 
	 echo "inserted";	
	 }
}


if(isset($_GET["did"]))
{
		$did=$_GET["did"];
		$upQry="delete from tbl_place where place_id =".$did;
	 	 if($con->query($upQry))
		 {
			 header("location:Place.php" );
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
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>District</td>
      <td>
        <label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option>--select--</option>
        <?php
		$selOptionQry="select * from tbl_district";
		$optionResult=$con->query($selOptionQry);
		while($optiondata=$optionResult->fetch_assoc())
		{
			
        ?>
        <option value="<?php echo $optiondata["district_id"]; ?> " >
        <?php echo $optiondata["district_name"];?>
        </option>
        <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_pname"></label>
      <input type="text" name="txt_pname" id="txt_pname" /></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pcode"></label>
      <input type="text" name="txt_pcode" id="txt_pcode" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>


 <br />
  <table width="200" border="1" align="center">
    <tr>
      <td>SINo.</td>
      <td>District</td>
      <td>Place</td>
      <td>Pincode</td>
      <td>Action</td>
    </tr>
    
    <?php
  $selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
    <tr>
      <td><?php echo $i;?></td>
    <td><?php echo $data["district_name"]; ?> </td>
     <td><?php echo $data["place_name"]; ?> </td>
      <td><?php echo $data["place_pincode"]; ?> </td>
     <td><a href="Place.php?did=<?php echo $data["place_id"];?>">Delete</a>
      </td>
    </tr>
     <?php
  }
  ?>
  </table>

  
</body>
</html>
<? include("Foot.php"); ?>

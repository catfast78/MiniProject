<?php
$dname="";
$eid=0;

include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btn_submit"]))
{
	$dname=$_POST["txt_dname"];
	 $eid=$_POST["txt_eid"];
	 if($eid==0)
	 {
		  $insQry="insert into tbl_district (district_name) values('".$dname."')";
		     if($con->query($insQry))
			 {
				 
			 echo "inserted";	
			 }
		  
	 }
	 else
	 {
	 	$upQry="update tbl_district set district_name='".$dname."' where district_id =".$eid;
		
	 	 if($con->query($upQry))
		 {
			 header("location:DistrictRegistration.php" );
		 }
      }
	 
	
  

}

if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$seldistrict="select*from tbl_district where district_id=".$eid;
	$selresult=$con->query($seldistrict);
	$seldata=$selresult->fetch_assoc();
	$dname=$seldata["district_name"];
}


if(isset($_GET["did"]))
{
		$did=$_GET["did"];
		$upQry="delete from tbl_district where district_id =".$did;
	 	 if($con->query($upQry))
		 {
			 header("location:DistrictRegistration.php" );
		 }
}

	
?>
	
	
	
	
	
	
	
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>District</td>
      <td><label for="txt_dname"></label>
      <input type="text" value="<?php  echo $dname ?>" name="txt_dname" id="txt_dname" />
      <input type="hidden" value="<?php  echo $eid ?>" name="txt_eid" id="txt_eid" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    
    </tr>
  </table>
  <br />
  <table width="200" border="1" align="center">
    <tr>
      <td>SINo.</td>
      <td>Dname</td>
      <td>Action</td>
    </tr>
    
    <?php
  $selQry="select * from tbl_district";
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
    <tr>
      <td><?php echo $i;?></td>
    <td><?php echo $data["district_name"]; ?> </td>
     <td><a href="DistrictRegistration.php?did=<?php echo $data["district_id"];?>">Delete</a>
     <a href="DistrictRegistration.php?eid=<?php echo $data["district_id"];?>">Edit</a> </td>
    </tr>
     <?php
  }
  ?>
  </table>
</form>
</body>
</html>
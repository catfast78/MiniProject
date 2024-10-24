<?php
ob_start();
include("Head.php");

session_start();

include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$photo=$_FILES["File_photo"]["name"];
	$tempphoto=$_FILES["File_photo"]["tmp_name"];
	move_uploaded_file($tempphoto,"../Assets/Files/salon/staff/".$photo);
	
	 
	
	 
	 
	
	$insQry ="insert into tbl_staff(staff_name,staff_email,staff_contact,staff_photo,salon_id) values('".$name."','".$email."','".$contact."','".$photo."','".$_SESSION['sid']."')";
     if($con->query($insQry))
	 {
		 
	 echo "inserted";	
	 }
}
	 if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_staff where staff_id=".$did;
	if($con->query($delQry))
	{
		header("loaction:staff.php");
		
		
	}
}

 
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input required type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input required type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input required type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="File_photo"></label>
      <input required type="file" name="File_photo" id="File_photo" /></td>
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
     <th>Email</th>
     <th>Contact</th>
     <th>Photo</th>
     <th>Action</th>
   </tr>
   <?php
  $selQry="select * from tbl_staff where salon_id=".$_SESSION['sid'];
  $result= $con->query($selQry);
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["staff_name"]; ?> </td>
    <td><?php echo $data["staff_email"]; ?></td> 
    
    <td><?php echo $data["staff_contact"]; ?></td>
     <td><?php echo $data["staff_photo"]; ?></td>
    <td><a href="staff.php?did=<?php echo $data["staff_id"];?>">Delete </td>
  </tr>
  <?php
  }
  ?>   
  </table>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>

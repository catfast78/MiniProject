<?php
include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	
	$photo=$_FILES["file_photo"]["name"];
	$tempphoto=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($tempphoto,"../Assets/Files/salon/photo/".$photo);
	
	$proof=$_FILES["file_proof"]["name"];
	$tempproof=$_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($tempproof,"../Assets/Files/salon/Proof/".$proof);
	
	$password=$_POST["txt_pwd"];
	 
	
	$insQry ="insert into tbl_salon(salon_name,salon_email,salon_address,salon_district,salon_place,salon_photo,salon_proof,salon_password) values('".$name."','".$email."','".$address."','".$district."','".$place."','".$photo."','".$proof."','".$password."')";
     if($con->query($insQry))
	 {
		 
	 echo "inserted";	
	 }
}

if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_salon where salon_id=".$did;
	if($con->query($delQry))
	{
		header("loaction:salon.php");
		
		
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

<form method="post" enctype="multipart/form-data">
<table width="200" border="1">
  <tr>
    <td>Name</td>
    <td> 
      <label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" placeholder="Name"/>
     </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td> 
      <label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" placeholder="Number" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"/>/>
     </td>
  </tr>
  <tr>
    <td>Address</td>
    <td> 
      <label for="txt_add"></label>
      <input type="text" name="txt_address" id="txt_add" required="required" placeholder="Enter Address"/>
     </td>
  </tr>
  <tr>
    <td>Email</td>
    <td> 
      <label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" placeholder="Enter Email"/>
     </td>
  </tr>
  <tr>
    <td>District</td>
    <td> 
      <label for="sel_district"></label>
      <select name="sel_district" id="sel_district" required>
      <option>--select--</option>
      <?php
		$selQry1="select* from tbl_district";
		$resultOne=$con->query($selQry1);
		while($data=$resultOne->fetch_assoc())
		{
			?>
      <option value="<?php echo $data["district_id"]?>" >
            <?php echo $data["district_name"]?> </option>
        
        <?php }
		?>
      </select>
     </td>
  </tr>
  <tr>
    <td>Place</td>
    <td> 
      <label for="sel_place"></label>
      <select name="sel_place" id="sel_place" required>
      <option>--select--</option>
      
      <?php
		$selQry2="select * from tbl_place";
		$resultTwo=$con->query($selQry2);
		while($data=$resultTwo->fetch_assoc())
		{
			?>
      <option value="<?php echo $data["place_id"]?>" >
            <?php echo $data["place_name"]?> </option>
        
        <?php }
		?>
      </select>
     </td>
  </tr>
  <tr>
    <td>Photo</td>
    <td> 
      <label for="file_photo"></label>
      <input required="required" type="file" name="file_photo" id="file_photo" />
     </td>
  </tr>
  <tr>
    <td>Proof</td>
    <td> 
      <label for="file_proof"></label>
      <input required="required" type="file" name="file_proof" id="file_proof" />
     </td>
  </tr>
  <tr>
    <td>Password</td>
    <td> 
      <label for="txt_pwd"></label>
      <input  required="required"type="password" name="txt_pwd" id="txt_pwd" />
     </td>
  </tr>
  <tr>
    <td colspan="2"> 
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
    </td>
  </tr>
</table>
</form>
</body>
</html>
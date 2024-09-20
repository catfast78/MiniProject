<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$pwd=$_POST["txt_pwd"];
  $district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	$photo=$_FILES["File_photo"]["name"];
    $temp=$_FILES["File_photo"]["tmp_name"];
     move_uploaded_file($temp,"../Assets/Files/Users/".$photo);
	
	$insQry ="insert into tbl_user(user_name,user_email,user_password,user_photo ,user_district,user_place) values('".$name."','".$email."','".$pwd."','".$photo."','".$district."','".$place."')";
     if($con->query($insQry))
	 {
		 
	 echo "inserted";	
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

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <div align="center">
   <h1 align="center"> UserRegistration</h1>
    <table width="436" height="280" border="1">
      
      <tr>
        <td width="254">Name</td>
        <td width="168"><label for="txt_name"></label>
        <input required type="text" name="txt_name" id="txt_name" placeholder="Enter Name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/>/></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><label for="txt_email"></label>
        <input required  type="text" name="txt_email" id="txt_email" placeholder="Enter Email" /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><label for="txt_pwd"></label>
        <input required type="password" name="txt_pwd" id="txt_pwd"  placeholder="Enter Password"/></td>
      </tr>
      <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
      <select name="sel_district"  onchange="getPlace(this.value)" id="sel_district">
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
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
      <select name="sel_place" id="sel_place">
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
      </select></td>
      </tr>
      <tr>
      <td>Photo</td>
      <td>
      <input type="file" name="File_photo" id="File_photo" required="required"/>
      </td>
      
      
      </tr>
      <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
      </tr>
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

</script>
</html>
<?php
session_start();

include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btn_submit"]))
{
	$date=$_POST["txt_date"];
	$time=$_POST["txt_time"];
	$selQry="select * from tbl_service where salon_id=".$_GET['did'];
    $result= $con->query($selQry);
	$data=$result->fetch_assoc();
	$amount=$data["service_price"];
	 
	
	$insQry ="insert into tbl_booking(booking_date,booking_time,booking_amount,user_id,service_id) values('".$date."','".$time."','".$amount."','".$_SESSION["aid"]."','".$_GET["did"]."')";
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
<a href="UserHome.php">Home</a>
<hr />

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Time</td>
      <td><label for="txt_time"></label>
      <input type="time" name="txt_time" id="txt_time" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
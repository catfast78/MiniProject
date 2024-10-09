
<?php
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
 $content=$_POST["txt_reply"];
 
 
 $insQry ="update tbl_complaint set complaint_reply ='".$content ."' where complaint_id=".$_GET["did"];
  
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Reply</td>
      <td><label for="txt_reply"></label>
      <input type="text" name="txt_reply" id="txt_reply" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
inlcude("Foot.php");
?>

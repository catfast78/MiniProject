<?php

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="../Guest/Login.php">Logout</a>
<table width="200" border="1" align="center">
  <tr>
    <td>Welcome :: <?php echo $_SESSION["adminname"]?> </td>
  </tr>
  <tr>
    <td><a href="DistrictRegistration.php">District</a></td>
</tr>
  <tr>
    <td><a href="Place.php">Place</a></td>
  </tr>
  <tr>
   <td><a href="AdminRegistration.php">AdminRegistration</a></td>
  </tr>
  <tr>
    <td><a href="MyProfile.php">Profile</a></td>
  </tr>
  <tr>
    <td> <a href="Verified.php"> View Salons</a></td>
  </tr>
  <tr>
    <td><a href="salon.php">Salon Registraion</a>;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
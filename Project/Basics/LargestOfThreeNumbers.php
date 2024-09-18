<?php
$n1=0;
$n2=0;
$n3=0;
$n4="";
if(isset($_POST["btn_submit"]))
{
	$n1=$_POST["txt_num1"];
	$n2=$_POST["txt_num2"];
	$n3=$_POST["txt_num3"];
	if($n1 > $n2 && $n1 >$n3)
	{
		$n4=$n1;
	}
	else if($n2 >$n1 && $n2 > $n3)
	{
		$n4=$n2;
	}
	else
	{
		$n4=$n3;
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
      <td>Number1</td>
      <td><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><label for="txt_num3"></label>
      <input type="text" name="txt_num3" id="txt_num3" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
    <tr>
      <td>Largest Number</td>
      <td><?php
	   echo $n4 ;?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
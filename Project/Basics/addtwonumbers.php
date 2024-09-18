<?php
$sum=0;
if(isset($_POST["btn_submit"]))
{
	$n1=$_POST["txt_num1"];
	$n2=$_POST["txt_num2"];
	$sum=$n1-$n2;
	
}
if(isset($_POST["btn_sum"]))
{
	$n1=$_POST["txt_num1"];
	$n2=$_POST["txt_num2"];
	$sum=$n1+$n2;
	
}
if(isset($_POST["btn_div"]))
{
	$n1=$_POST["txt_num1"];
	$n2=$_POST["txt_num2"];
	$sum=$n1/$n2;
	
}
if(isset($_POST["btn_pro"]))
{
	$n1=$_POST["txt_num1"];
	$n2=$_POST["txt_num2"];
	$sum=$n1*$n2;
	
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.Table_Box{
	width:300pxpx;
	height:200px;
	
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div  class="Table_Box" align="center">
 <h1>CALCULATOR</h1>
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
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_sub" value="Sub" />
        <input type="submit" name="btn_sum" id="btn_sum" value="Add" />
        <input type="submit" name="btn_pro" id="btn_pro" value="Mul" />
        <input type="submit" name="btn_div" id="btn_div" value="Div" />
      </div></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php
	  echo $sum;
      
	  ?></td>
    </tr>
    </table>
  </div>
</form>
</body>
</html>
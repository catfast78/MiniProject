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
      <td>Number</td>
      <td><label for="txt_num"></label>
      <input type="text" name="txt_num" id="txt_num" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
      <td><?php
	  
 if(isset($_POST["btn_submit"]))
 {
   $number=$_POST["txt_num"];
   
 
$a = 0;
$b = 1;
 
$fibonacci = $a + $b;
 
if ($number == 0 || $number == 1) {
    $isFibonacci = true;
} else {
     
    while ($fibonacci < $number) {
        // Calculate the next Fibonacci number
        $a = $b;
        $b = $fibonacci;
        $fibonacci = $a + $b;
    }
    // Check if the number is a Fibonacci number
    $isFibonacci = ($fibonacci == $number);
}

// Output the result
if ($isFibonacci) {
    echo "The number $number is in the Fibonacci series.";
} else {
    echo "The number $number is not in the Fibonacci series.";
}
 }
?></td>
    </tr>
  </table>
</form>
</body>
</html>
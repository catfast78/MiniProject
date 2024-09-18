 
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
	  $isPrime = true;
	  // Define the number you want to check
 if(isset($_POST["btn_submit"]))
 {$number=$_POST["txt_num"];

 

// 0 and 1 are not prime numbers
if ($number <= 1) {
    $isPrime = false;
} else {
    // Check divisibility from 2 to the square root of the number
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}
 }
	  
// Output the result
if ($isPrime==true) {
    echo "The number is prime.";
} else {
    echo "The number is not prime.";
}
      ?></td>
    </tr>
  </table>
</form>
</body>
</html>
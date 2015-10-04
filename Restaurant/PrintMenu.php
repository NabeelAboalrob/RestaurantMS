<?php session_start();

if(!isset($_SESSION["user2"])){ 
header("location:Index.php");
 		 } 
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Menu</title>



</head>

<body onload='javascript:window.print()'>
<?php

echo" <center><h1>Menu</h1></center>";
include ('Connection.php');
$result = @mysqli_query($Conn,"SELECT * FROM Menu");
echo "<center><table  border='2' \>
<tr>
<th>ItemName</th>
<th>ItemPrice</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ItemName'] . "</td>";
  echo "<td>" . $row['ItemPrice'] . "</td>";
 
  }
echo "</table>";

 
mysqli_close($Conn);


?>
</body>
</html>

<?php session_start();

if(!isset($_SESSION["user2"])){ 
header("location:Index.php");
 		 } 
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table Bill</title>



</head>

<body onload='javascript:window.print()'>

<?php

$TableID=$_GET['TableID'];
echo" <center><h1>Bill</h1></center>";
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM Orders WHERE TableID='$TableID' AND OrderStatus='1'");


echo "<center><table  border='2' \>
<tr>
<th>ItemName</th>
<th>Quantity</th>
<th>Price</th>
</tr>";
$summ=0;
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ItemName'] . "</td>";
  $ItemName=$row['ItemName'];
  echo "<td>" . $row['Quantity'] . "</td>";
  $result3 = @mysqli_query($Conn,"SELECT ItemPrice FROM Menu WHERE ItemName = '$ItemName'");
			  $row3= mysqli_fetch_array($result3);
			  $ItemPrice=$row3['ItemPrice'];
  echo "<td>" . $row3['ItemPrice']*$row['Quantity'] . "</td>";
 $summ+=$row3['ItemPrice']*$row['Quantity'];
  echo "</tr>";

}

echo"<tr><td><td>Sum<td>".$summ."</td></td></td></tr>";

echo"<tr><td><td><td><a href='PrintBill.php?TableID=".$TableID."' >Print</a></td></td></td></tr>";
echo "</table>";

 
mysqli_close($Conn);


?>


</body>
</html>

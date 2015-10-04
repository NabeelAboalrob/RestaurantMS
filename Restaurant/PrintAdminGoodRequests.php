<?php session_start();

if(!isset($_SESSION["user1"])) 
{if(!isset($_SESSION['user2'])){

header("location:Index.php");
	
	
	}



}



 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Requests Menu</title>



</head>

<body onload='javascript:window.print()'>
<?php

echo" <center><h1>Requests Menu</h1></center>";
include ('Connection.php');
$result = @mysqli_query($Conn,"SELECT * FROM goodsrequests");


echo "<center><table  border='2' \>
<tr>
<th>GoodSName</th>
<th>Quantity</th>
<th>Unit</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['GoodsName'] . "</td>";
  echo "<td>" . $row['GoodsQuantity'] . "</td>";
  echo "<td>" . $row['Unit'] . "</td>";
  echo "</tr>";

}
echo "</table>";

 
mysqli_close($Conn);


?>
</body>
</html>

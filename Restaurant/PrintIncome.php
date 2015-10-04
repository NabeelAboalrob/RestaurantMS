
<?php
session_start();
if(!isset($_SESSION["user1"])){ 
header("location:Index.php");
 		 } 
		 
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incomes Printed Copy</title>
</head>

<body onload='javascript:window.print()'>

<?php $Fdate=$_GET['Fdate'];
			 $Ldate=$_GET['Ldate'];
			 
			  //Custom SearchDate
include ('connection.php');
echo"<center><c style='color:orange'>Reataurant Incomes From <c style='color:red;'>$Fdate</c> To <c style='color:red;'>$Ldate</c></c></center><br><br>";
$result = @mysqli_query($conn,"SELECT * FROM Income WHERE Date BETWEEN '$Fdate' AND '$Ldate';");

echo "<center><table id='t'  border='2' \>
<tr>
<th><c style='color:orange'>Date</c></th>
<th><c style='color:orange'>Ammount</c></th>
</tr>";
$sum=0;
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Date'] . "</td>";
   echo "<td>" . $row['Amount'] . "</td>"; 
  echo "</tr>";
$sum=$sum+$row['Amount'];
}

echo "<tr><td><c style='color:orange'>Sum</c></td><td>$sum</td></tr>
</table>";
 

 
mysqli_close($Conn);	 
	 
	 
?>

</body>
</html>

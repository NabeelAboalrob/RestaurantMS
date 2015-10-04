<?php session_start();

if(!isset($_SESSION["user1"])){ 
header("location:Index.php");
 		 } 
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendane Report</title>



</head>

<body onload='javascript:window.print()'>
<?php
$count=0;
$EmployeeID=$_GET['Eid'];
			
			 $Fdate=$_GET['Fdate'];
			 $Ldate=$_GET['Ldate'];
			 
	
include ('Connection.php');
echo"<center><c style='color:orange'>Attendance From <c style='color:red;'>$Fdate</c> To <c style='color:red;'>$Ldate</c></c></center><br><br>";
$result = @mysqli_query($Conn,"SELECT * FROM Attendance WHERE EID = '$EmployeeID' AND Date BETWEEN '$Fdate' AND '$Ldate';");

echo "<center><table id='t'  border='2' \>
<tr>
<th><c style='color:orange'>Attendance Date & Time</c></th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['AttendanceDate'] . "</td></tr>";
 
  $count=$count+1;
 
}

echo "<tr><td><c style='color:orange'>Days Number:</c>$count</td></tr>";
mysqli_close($Conn);	 
	 
	 
	 
?>
</body>
</html>

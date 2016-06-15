<?php session_start();

if(!isset($_SESSION["user1"])){ 
header("location:Index.php");
 		 } 
 ?>
 
 <!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 
<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Absence List</title>
<link rel="stylesheet" type="text/css" href="css/TableStyle.css" />
<style>
.edit{
	color:#F93;
	text-decoration: none ;

		}
	
.tablecss {
	background-color: #FFF;
}
</style>

<?php $tag=$_GET['Tag'];     ?>

</head>
<body bgcolor="#dcdddf">

<div class="container">
	<section id="content"  style="width:250px;">
		<div>
      <?php  
	  
	  
	  if($tag==0){
	  echo"<h1>Absence List</h1>";


$Date=date("Y-m-d");
include ('Connection.php');
echo "<center><table  border='2' \>
<tr>
<th><c style='color:red'>Employees Name</c></th>
</tr>";
$NameQuery=@mysqli_query($Conn,"SELECT Eid,Fname,Lname FROM Employee");
while($row=mysqli_fetch_array($NameQuery)){
$Fname=$row['Fname'];
$Lname=$row['Lname'];
$EmployeeName=$Fname." ".$Lname;
$EmployeeID=$row['Eid'];

$result = @mysqli_query($Conn,"SELECT AttendanceID FROM Attendance WHERE Eid='$EmployeeID' AND Date='$Date'");
$num= @mysqli_num_rows($result);
if($num==0)
{
  echo "<tr>";
  echo "<td>" .$EmployeeName. "</td></tr>";
  
}}
echo "</table><br><br>";
mysqli_close($Conn);}else{
	
	//attendance list
	echo"<h1>Attendance List</h1>";


$Date=date("Y-m-d");
include ('Connection.php');
echo "<center><table  border='2' \>
<tr>
<th><c style='color:orange'>Employees Name</c></th>
</tr>";
$NameQuery=@mysqli_query($Conn,"SELECT Eid,Fname,Lname FROM Employee");
while($row=mysqli_fetch_array($NameQuery)){
$Fname=$row['Fname'];
$Lname=$row['Lname'];
$EmployeeName=$Fname." ".$Lname;
$EmployeeID=$row['Eid'];

$result = @mysqli_query($Conn,"SELECT AttendanceID FROM Attendance WHERE Eid='$EmployeeID' AND Date='$Date'");
$num= @mysqli_num_rows($result);
if($num>0){


  echo "<tr>";
  echo "<td>" .$EmployeeName. "</td></tr>";
}}
echo "</table><br><br>";
mysqli_close($Conn);
	}
?>	
 </div>

    <div> <a style="color:#333" href="AdminPage.php">Back</a>
     </div>
     <div>
     <a style="color:#333" href="AdminLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


</body>
</html>

<?php session_start();

if(!isset($_SESSION["user1"])){ 
header("location:Index.php");
 		 } 
 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Employees List</title>
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



</head>
<body bgcolor="#dcdddf">

<div class="container">
	<section id="content">
		<div>
        <h1>Employees List</h1>
       

<?php

include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT EID,Fname,Lname,UserName,EPassword,EMail FROM Employee");

echo "<center><table  border='2' \>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
<th>password</th>
<th>E-Mail</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['EID'] . "</td>";
  echo "<td>" . $row['Fname'] . "</td>";
  echo "<td>" . $row['Lname'] . "</td>";
  echo "<td>" . $row['UserName'] . "</td>";
  echo "<td>" . $row['EPassword'] . "</td>";
  echo "<td>" . $row['EMail'] . "</td>";
  
  
  echo "<td><a class='edit' href='EditEmp.php?eid=".$row['EID']."&Fname=". $row['Fname'] ."&Lname=". $row['Lname'] ."&username=". $row['UserName'] ."&password=". $row['EPassword'] ."&email=". $row['EMail'] ."' >&nbsp; Edit &nbsp;</a></td>";
  
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='eid' name='eid' value=" . $row['EID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";

}

echo "</table>";
 

 
mysqli_close($Conn);


?>



   
		
 </div>

    <div> <a style="color:#333" href="AdminPage.php">Back To Admin Page</a>
     </div>
     <div>
     <a style="color:#333" href="AdminLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


 
 <?php
 
 
  /* Delete php code*/
 
 if(isset($_POST['formDelete'])){
if(isset($_POST['eid'])){
   
 include ('Connection.php');
    $eid = $_POST['eid'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM Employee WHERE EID =".$eid);
mysqli_close($Conn);
 header("location: EmpList.php");
}

 
 }

 /*end delete code*/
?>

</body>
</html>

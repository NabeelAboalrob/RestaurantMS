
<?php
session_start();
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
<title>Attendance Page</title>
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
        <h1>Employees Attendance</h1>
<div>

<?php
include ('Connection.php');
echo"-----------------------------------------------------";
echo"<form id='form1' name='form1' method='post' action=''>
<c style='color:orange'>View </c>			
<select name='EmployeeID'>
        ";
		
		  
		  
        $query = "SELECT * FROM Employee";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){                                                 
          echo"  <option value='".$row['Eid']."' >".$row['Fname']." ".$row['Lname']."</option>";}
            
       
  echo"            
    </select>";
             
            
 ?>
<c style='color:orange'> Attendance From</c> <input type="date" name="Fdate" required="" ><c style='color:orange'> TO </c> <input type="date" name="Ldate" Required="" ><c style='color:orange'> ►</c> <input type="submit" name="Search" value="Go">
   
   </form>
   <br><br>
   <form name="WipeForm" method="post" action="">
	   
<input type='submit' name='Wipe' id='Wipe' value='Wipe' />    
   </form>
    <?php
   if (isset($_POST['Wipe'])){
				 echo "<br><a Style='color:orange'>This Command Will Wipe All Attendance History, </a><d style='color:red'>Are You Sure ?</d>";
				 echo "<br><br> <form name='WipeConfirm' method='post' action=''>
							<input type='submit' name='WipeConfirm' id='WipeConfirm' value='OK !' />
							<input type='submit' name='Cancel' id='Cancel' value='Cancel' />    
							</form>";
				 
				 
				 }
   ?>
   <?php
   if (isset($_POST['WipeConfirm'])){
	   include ('Connection.php');
 
    
 
@mysqli_query($Conn,"TRUNCATE Attendance");
 mysqli_close($Conn);

	   
	   }elseif (isset($_POST['Cancel'])){
		   
		   
		   }
   ?>
<br> 
  -----------------------------------------------------
   </div>
   
   <br> 
<?php if(isset($_POST['Search'])){
	 //Custom Search
$count=0;
$EmployeeID=$_POST['EmployeeID'];
			
			 $Fdate=$_POST['Fdate'];
			 $Ldate=$_POST['Ldate'];
	  
        $query = "SELECT Fname,Lname FROM Employee WHERE EID='$EmployeeID'";
        $result = mysqli_query($Conn,$query);  
        $row=mysqli_fetch_array($result)  ;                                             
    
            		 echo "<c style='color:red'>".$row['Fname']." ".$row['Lname']."</c>";
	
include ('Connection.php'); 
echo"<c style='color:orange'>Attendance From <c style='color:red;'>$Fdate</c> To <c style='color:red;'>$Ldate</c></c><br><br>";
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

echo "<tr><td><c style='color:orange'>Days Number:</c>$count</td></tr><tr><td><a href='PrintAttendance.php?&Fdate=".$Fdate."&Ldate=".$Ldate."&Eid=".$EmployeeID."'  target='_blank'>&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;</a></td></tr></table>";
 

 
mysqli_close($Conn);	 
	 
	 
	 
	 //end date search
			 
			 
			 
			 
}
			 ?>
			 <br><br>

    <div> <a style="color:#333" href="AdminPage.php">Back To Admin Page</a>
     </div>
     <div>
     <a style="color:#333" href="AdminLogout.php">Logout</a>
    
    </div>			 
</body>
</html>

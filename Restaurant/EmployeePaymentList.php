
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
<title>Payment List</title>
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
        <h1>Payments</h1>
<div>

<?php
include ('Connection.php');
echo"----------------- Employees Payments --------------------";
echo"<form id='form1' name='form1' method='post' action=''>
<c style='color:orange'>View </c>			
<select id='EmployeeName' name='EmployeeID'>
        ";
		
		  
		  
        $query = "SELECT EID,Fname,Lname FROM Employee";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){                                                 
          echo"  <option value='".$row['EID']."' >".$row['Fname']." ".$row['Lname']."</option>";}
            
       
  echo"            
    </select><c style='color:orange'> Payments ►</c>";
             
            
 ?>
     
   <input type="submit" name="Search" value="Go"></form><br>
<form name="form2" method="post" action="">  <c style='color:orange'> Payments From</c> <input type="date" name="Fdate" required="" ><c style='color:orange'> TO </c> <input type="date" name="Ldate" Required="" ><c style='color:orange'> ►</c> <input type="submit" name="SearchDate" value="Go">
   
   </form><br>
  ----------------- Other Payments --------------------
   </div>
   
   <div>

<form name="OtherPaymentForm" method="post" action="">  <c style='color:orange'> Payments From</c>


 <input type="date" name="Fdate" required="" >
 
 
 <c style='color:orange'> TO </c> <input type="date" name="Ldate" Required="" ><c style='color:orange'> ►</c> <input type="submit" name="OtherSearchDate" value="Go">
   
   </form>
  -----------------------------------------------------
   </div>
   
   
   
   <br> 
 <?php
 if(isset($_POST['Search'])){
	 //Custom Search

$EmployeeID=$_POST['EmployeeID'];

  
        $query = "SELECT Fname,Lname FROM Employee WHERE EID='$EmployeeID'";
        $result = mysqli_query($Conn,$query);  
        $row=mysqli_fetch_array($result);





$EmployeeName="".$row['Fname']." ".$row['Lname']."";


echo"<c style='color:red'>$EmployeeName</c> <c style='color:orange'>Payments</c><br><br>";
$result = @mysqli_query($Conn,"SELECT * FROM Payments WHERE EID='$EmployeeID'");

echo "<center><table id='t'  border='2' \>
<tr>
<th>Amount</th>
<th>Discription</th>
<th>Date</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['PaymentAmount'] . "</td>";
  echo "<td>" . $row['PaymentDiscription'] . "</td>";
  echo "<td>" . $row['PaymentDate'] . "</td>"; 
  
  echo "<td><form action='' method='post'><input type='hidden' id='PaymentID' name='PaymentID' value=".$row['PaymentID']." /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}

echo "</table><br><br>";
 

 
mysqli_close($Conn);	 
	 
	 
	 
	 
	 
	 
	 
	 
	 }
		 else{
			 
			 
			 		
		 if (isset($_POST['SearchDate'])){
			
			 $Fdate=$_POST['Fdate'];
			 $Ldate=$_POST['Ldate'];
			 
			  //Custom SearchDate
include ('Connection.php');
echo"<c style='color:orange'>Payments From <c style='color:red;'>$Fdate</c> To <c style='color:red;'>$Ldate</c></c><br><br>";
$result = @mysqli_query($Conn,"SELECT * FROM Payments WHERE PaymentType = 'EmployeeSa' AND PaymentDate BETWEEN '$Fdate' AND '$Ldate';");

echo "<center><table id='t'  border='2' \>
<tr>
<th>Full Name</th>
<th>Amount</th>
<th>Discription</th>
<th>Date</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['EmployeeName'] . "</td>";
  echo "<td>" . $row['PaymentAmount'] . "</td>";
  echo "<td>" . $row['PaymentDiscription'] . "</td>";
  echo "<td>" . $row['PaymentDate'] . "</td>"; 
  
  echo "<td><form action='' method='post'><input type='hidden' id='PaymentID' name='PaymentID' value=".$row['PaymentID']." /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}

echo "</table><br><br>";
 

 
mysqli_close($Conn);	 
	 
	 
	 
	 //end date search
			 
			 
			 
			 
			 
			 
			 
			 }else{
			 

 if (isset($_POST['OtherSearchDate'])){
			
			 $Fdate=$_POST['Fdate'];
			 $Ldate=$_POST['Ldate'];
			 
			  //Custom SearchDate
include ('Connection.php');
echo"<c style='color:orange'>Payments From <c style='color:red;'>$Fdate</c> To <c style='color:red;'>$Ldate</c></c><br><br>";
$result = @mysqli_query($Conn,"SELECT * FROM Payments WHERE PaymentType = 'Other' AND PaymentDate BETWEEN '$Fdate' AND '$Ldate';");

echo "<center><table id='t'  border='2' \>
<tr>
<th>Amount</th>
<th>Discription</th>
<th>Date</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['PaymentAmount'] . "</td>";
  echo "<td>" . $row['PaymentDiscription'] . "</td>";
  echo "<td>" . $row['PaymentDate'] . "</td>"; 
  
  echo "<td><form action='' method='post'><input type='hidden' id='PaymentID' name='PaymentID' value=".$row['PaymentID']." /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}

echo "</table><br><br>";
 

 
mysqli_close($Conn);	 
	 
	 
	 
	 //end date search
			 
			 
			 
			 
			 
			 
			 
			 }
			 
			 }
		 }
		 ?>


</div>
<div> <a style="color:#333" href="AddPayment.php">Add New Payment</a>
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
if(isset($_POST['PaymentID'])){
   
 include ('Connection.php');
    $PaymentID =$_POST['PaymentID'];
    


$result = @mysqli_query($Conn,"DELETE FROM Payments WHERE PaymentID =".$PaymentID);
mysqli_close($Conn);
 header("location:EmployeePaymentList.php");

 
}

 
 
 }
 /*end delete code*/
?>
</body>
</html>

<?php session_start();

if(!isset($_SESSION["user2"])){ 
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
<title>Order List</title>
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
        <h1>Order List</h1>

<?php
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM Orders WHERE OrderStatus='0' ORDER BY OrderDate ASC");

echo "<center><table  border='2' \>
<tr>
<th>OrderID</th>
<th>ItemName</th>
<th>TableID</th>
<th>Quantity</th>
<th>OrderDate</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['OrderID'] . "</td>";
  echo "<td>" . $row['ItemName'] . "</td>";
  echo "<td>" . $row['TableID'] . "</td>";
  echo "<td>" . $row['Quantity'] . "</td>";
  echo "<td>" . $row['OrderDate'] . "</td>";
  
   
  
  echo "<td><a class='edit' href='ModifyOrder.php?OrderID=".$row['OrderID']."&Quantity=".$row['Quantity']."' >&nbsp; Edit &nbsp;</a></td>";
  
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='OrderID' name='OrderID' value=" . $row['OrderID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}

echo "</table>";
 

 
mysqli_close($Conn);
?>



   
		
 </div>

    <div> <a style="color:#333" href="EmpPage.php">Back To Employee Page</a>
     </div>
     <div>
     <a style="color:#333" href="Emplogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


 
 <?php
 
 
  /* Delete php code*/
 
 if(isset($_POST['formDelete'])){
if(isset($_POST['OrderID'])){
   
  include ('Connection.php');
    $OrderID = $_POST['OrderID'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM Orders WHERE OrderID =".$OrderID);
 mysqli_close($Conn);
 header("location: OrderList.php");
}

 
 }

 /*end delete code*/
?>

</body>
</html>

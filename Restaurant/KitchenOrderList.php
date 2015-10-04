
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


<?php
$seconds =10; //will redirect after 10 seconds
header("Refresh: $seconds; url=KitchenOrderList.php");
?>
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
<th>date</th>
<th>Done</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['OrderID'] . "</td>";
  echo "<td>" . $row['ItemName'] . "</td>";
  echo "<td>" . $row['TableID'] . "</td>";
  echo "<td>" . $row['Quantity'] . "</td>";
  echo "<td>" . $row['OrderDate'] . "</td>";
 
  
  
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='OrderID' name='OrderID' value=" . $row['OrderID'] . " /> <input type='submit' name='formdone' id='formDone' value='Done' /></form> </td>";
  echo "</tr>";
}

echo "</table>";
 

 
mysqli_close($Conn);
?>



   
		
 </div>

    <div> <a style="color:#333" href="KitchenPage.php">Back To Ktichen Page</a>
     </div>
     <div>
     <a style="color:#333" href="EmpLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


 
 <?php
  
 
  /* Delete php code*/
 
 if(isset($_POST['formdone'])){
if(isset($_POST['OrderID'])){
   include ('Connection.php');
 
    $OrderID = $_POST['OrderID'];
    
 

$result = @mysqli_query($Conn,"UPDATE Orders SET OrderStatus='1' WHERE OrderId=".$OrderID);
mysqli_close($Conn);

 header("location: KitchenOrderList.php");
}

 
 }
 /*end delete code*/
?>

</body>
</html>

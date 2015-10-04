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
<title>Requested Goods List</title>
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
        <h1>Requested Goods List</h1>

<?php
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM GoodsRequests");

echo "<center><table  border='2' \>
<tr>
<th>ID</th>
<th>GoodSName</th>
<th>Quantity</th>
<th>Unit</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['RequestID'] . "</td>";
  echo "<td>" . $row['GoodsName'] . "</td>";
  echo "<td>" . $row['GoodsQuantity'] . "</td>";
    echo "<td>" . $row['Unit'] . "</td>";
 
  
   
  
  echo "<td><a class='edit' href='ModifyGoodsRequest.php?RequestID=".$row['RequestID']."&GoodsName=".$row['GoodsName']."&GoodsQuantity=".$row['GoodsQuantity']."&Unit=".$row['Unit']."' >&nbsp; Edit &nbsp;</a></td>";
  
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='RequestID' name='RequestID' value=" . $row['RequestID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}
echo"<tr><td><td><td><td><td><td><a href='PrintAdminGoodRequests.php' target='_blank' >&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td></td></td></td></td></td></tr>";
echo "</table>";
 

 
mysqli_close($Conn);
?>



   
		
 </div>

    <div> <a style="color:#333" href="KitchenPage.php">Back To Kitchen Page</a>
     </div>
     <div>
     <a style="color:#333" href="EmpLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


 
 <?php
 
 
  /* Delete php code*/
 
 if(isset($_POST['formDelete'])){
if(isset($_POST['RequestID'])){
   
  include ('Connection.php');
    $RequestID = $_POST['RequestID'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM GoodsRequests WHERE RequestID =".$RequestID);
 mysqli_close($Conn);
 header("location: GoodsRequestList.php");
}

 
 }

 /*end delete code*/
?>

</body>
</html>

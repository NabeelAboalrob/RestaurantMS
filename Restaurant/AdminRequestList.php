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
        <h1>Requested Good List</h1>

<?php
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM GoodsRequests");

echo "<center><table  border='2' \>
<tr>
<th>GoodSName</th>
<th>Quantity</th>
<th>Unit</th>
<th>Status</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
 
  echo "<td>" . $row['GoodsName'] . "</td>";
  echo "<td>" . $row['GoodsQuantity'] . "</td>";
    echo "<td>" . $row['Unit'] . "</td>";
 
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='RequestID' name='RequestID' value=" . $row['RequestID'] . " /> <input type='submit' name='Done' id='Done' value='Done' /></form> </td>";
  echo "</tr>";
  
  


}
echo"<tr><td><td><td><td><a href='AllDone.php' >&nbsp;&nbsp;All Done&nbsp;&nbsp;</a></td></td></td></td></tr>";

echo"<tr><td><td><td><td><a href='PrintAdminGoodRequests.php' target='_blank' >&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td></td></td></td></tr>";


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
 
 if(isset($_POST['Done'])){
if(isset($_POST['RequestID'])){
   
  include ('Connection.php');
    $RequestID = $_POST['RequestID'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM GoodsRequests WHERE RequestID =".$RequestID);
 mysqli_close($Conn);
 header("location: AdminRequestList.php");
}

 
 }

 /*end delete code*/
?>

</body>
</html>

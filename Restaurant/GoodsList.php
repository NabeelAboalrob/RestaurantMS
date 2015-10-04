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
<title>Goods List</title>
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
        <h1>Goods List</h1>

<?php
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM Goods");

echo "<center><table  border='2' \>
<tr>
<th>ID</th>
<th>GoodSName</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['GoodsID'] . "</td>";
  echo "<td>" . $row['GoodsName'] . "</td>";
  
 
  
   
  
  echo "<td><a class='edit' href='ModifyGoods.php?GoodsID=".$row['GoodsID']."&GoodsName=".$row['GoodsName']."' >&nbsp; Edit &nbsp;</a></td>";
  
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='GoodsID' name='GoodsID' value=" . $row['GoodsID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}
echo"<tr><td><td><td><td><a href='PrintGoodList.php' target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<c style='color:Red;'>Print</c>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td></td></td></td></tr>";
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
if(isset($_POST['GoodsID'])){
   
  include ('Connection.php');
    $GoodsID = $_POST['GoodsID'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM Goods WHERE GoodsID =".$GoodsID);
 mysqli_close($Conn);
 header("location: GoodsList.php");
}

 
 }

 /*end delete code*/
?>

</body>
</html>

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
<title>MENU</title>
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
        <h1>Items Menu</h1>

<?php
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM Menu");

echo "<center><table  border='2' \>
<tr>
<th>ItemID</th>
<th>ItemName</th>
<th>ItemPrice</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ItemID'] . "</td>";
  echo "<td>" . $row['ItemName'] . "</td>";
  echo "<td>" . $row['ItemPrice'] . "</td>";
 
  
  
  echo "<td><a class='edit' href='EditItem.php?ItemID=".$row['ItemID']."&ItemName=".$row['ItemName']."&ItemPrice=". $row['ItemPrice']  ."' >&nbsp; Edit &nbsp;</a></td>";
  
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='ItemID' name='ItemID' value=" . $row['ItemID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";
}
echo"<tr><td><td><td><td><td><a href='PrintMenu.php' target='_blank' >&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td></td></td></td></td></tr>";
echo "</table>";
 

 
mysqli_close($Conn);
?>
<br>
   <form name="WipeForm" method="post" action="">
	   
<input type='submit' name='Wipe' id='Wipe' value='Wipe' />    
   </form>
    <?php
   if (isset($_POST['Wipe'])){
				 echo "<br><a Style='color:orange'>This Command Will Wipe the whole Menu, </a><d style='color:red'>Are You Sure ?</d>";
				 echo "<br><br> <form name='WipeConfirm' method='post' action=''>
							<input type='submit' name='WipeConfirm' id='WipeConfirm' value='OK !' />
							<input type='submit' name='Cancel' id='Cancel' value='Cancel' />    
							</form>";
				 
				 
				 }
   ?>
   <?php
   if (isset($_POST['WipeConfirm'])){
	   include ('Connection.php');
 
    
 
@mysqli_query($Conn,"TRUNCATE Menu");
 mysqli_close($Conn);
header('location:ItemsMenu.php');
	   
	   }elseif (isset($_POST['Cancel'])){
		   
		   
		   }
   ?>
<br>


   
		
 </div>

<div> <a style="color:#333" href="AddItem.php">Add New To Menu</a>
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
if(isset($_POST['ItemID'])){
 include ('Connection.php');
    $ItemID = $_POST['ItemID'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM Menu WHERE ItemID =".$ItemID);
mysqli_close($Conn);
 header("location: ItemsMenu.php");
}

 
 }

 /*end delete code*/
?>

</body>
</html>

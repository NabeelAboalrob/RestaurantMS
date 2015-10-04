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
<title>Close Table</title>
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
        <h1>View Bill</h1>
        </div>
        <div>
        	<form id="form1" name="form1" method="post" action="">
			
			
            <div>
				<input type="text" name="TableID" required="" id="TableID" placeholder="TableID" maxlength="11" />
		
            </div>
           <br>
			<div>
				<input type="submit" name="ViewBill" id="ViewBill" value="View Bill"/>
			</div>
            <div>
				<input type="submit" name="Close" id="Close" value="Close"/>
			</div>
           
		</form><!-- form -->
		
        <p>-------------------------------------------</p>
        </div>
        
        
        
        
        <div>
        
        
      
<?php
if (isset($_POST['ViewBill'])) {

$TableID=$_POST["TableID"];
if(!is_numeric($TableID))
		{echo"Please Enter Valid TableID";}else{
echo" <h1>Bill</h1>";
include ('Connection.php');
//Retrieve Orders And Show it in a bill with Sum
$result = @mysqli_query($Conn,"SELECT * FROM Orders WHERE TableID='$TableID' AND OrderStatus='1'");


echo "<center><table  border='2' \>
<tr>
<th>ItemName</th>
<th>Quantity</th>
<th>Price</th>
</tr>";
$summ=0;
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ItemName'] . "</td>";
  $ItemName=$row['ItemName'];
  echo "<td>" . $row['Quantity'] . "</td>";
  $result3 = @mysqli_query($Conn,"SELECT ItemPrice FROM Menu WHERE ItemName = '$ItemName'");
			  $row3= mysqli_fetch_array($result3);
			  $ItemPrice=$row3['ItemPrice'];
  echo "<td>" . $row3['ItemPrice']*$row['Quantity'] . "</td>";
 $summ+=$row3['ItemPrice']*$row['Quantity'];
  echo "</tr>";
	
}

echo"<tr><td><td>Sum<td>".$summ."</td></td></td></tr>";

echo"<tr><td><td><td><a href='PrintBill.php?TableID=".$TableID."' target='_blank'>&nbsp;Print&nbsp;</a></td></td></td></tr>";
echo "</table>";

	
			
 
mysqli_close($Conn);
}


}
?>
<?php

if(isset($_POST['Close']))
{$Date=date("Y-m-d");
	
	include ('Connection.php');
	$TableID=$_POST["TableID"]; 
	if(!is_numeric($TableID))
		{echo"Please Enter Valid TableID";}else{
			
			// inserting Table Account  into income 
			
			
			$result = @mysqli_query($Conn,"SELECT * FROM Orders WHERE TableID='$TableID' AND OrderStatus='1'");
$summ=0;
while($row = mysqli_fetch_array($result)) {
	  $ItemName=$row['ItemName'];
 $result3 = @mysqli_query($Conn,"SELECT ItemPrice FROM Menu WHERE ItemName = '$ItemName'");
			  $row3= mysqli_fetch_array($result3);
			  $ItemPrice=$row3['ItemPrice'];
 $summ+=$row3['ItemPrice']*$row['Quantity'];}
			
			
			$chick=@mysqli_query($Conn,"SELECT * FROM Income WHERE Date='$Date' ");
			$num=mysqli_num_rows($chick);
			if ($num>0){
			
			@mysqli_query($Conn,"UPDATE Income SET Amount = Amount + '$summ'");
			}else{@mysqli_query($Conn,"INSERT INTO Income VALUES ('$Date','$summ')");}
			
			
			
			
			
			//closing Table
		
	if( @mysqli_query($Conn,"DELETE FROM Orders WHERE TableID='$TableID'")&&@mysqli_query($Conn,"UPDATE Tables SET Account=0 WHERE TableID='$TableID'")){echo"Table Closed!";}
			  else{echo"Some Thing Went Wrong";}
	
			 
	mysqli_close($Conn);
	}

}
?>



<p>-------------------------------------------</p><br>      


   
		
 </div>

    <div> <a style="color:#333" href="EmpPage.php">Back To Employee Page</a>
     </div>
     <div>
     <a style="color:#333" href="EmpLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


 
 
</body>
</html>

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
<title>new order</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>

	
<div class="container">
	<section id="content">
    
<?php $OrderDate=date("Y-m-d H:i:s");?>    
		<form id="form1" name="form1" method="post" action="">
        
        
			<h1>New Order</h1>
            
            
			 <div>

   <div><c style="color:orange"> Item</c></div>
   <?php include ('Connection.php'); ?>
    <select id='ItemName' name='ItemName'>
        <?php
		
		  
		  
        $query = "SELECT * FROM Menu";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){                                                 
            echo "<option value='".$row['ItemName']."' >".$row['ItemName']."</option>";
            }
        ?>          
    </select>
			</div>
            <div>
	<div><c style="color:orange">Select Table</c></div>
    <select id='TableID' name='TableID'>
        <?php
		
		  
		  
        $query = "SELECT * FROM Tables";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){                                                 
            echo "<option value='".$row['TableID']."' >".$row['TableID']."</option>";
            }
			mysqli_close($Conn);
	  
        ?>          
    </select>
			</div>
            
           
           <div>
           
	<input type="text" id="Quantity" name="Quantity" required=""  placeholder="Quantity" maxlength="11"/>
		
            </div>
			<div>
           
	<input type="submit" name="neworder" id="neworder" value="Submit"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	

	
   if(isset($_POST["neworder"]))
   {
	include ('Connection.php');
$ItemName=$_POST["ItemName"];
$TableID=$_POST["TableID"];
$Quantity=$_POST["Quantity"];
 
	if(!is_numeric($Quantity))
  {
   echo "Quantity Should Be Integer #";
  }else{
	  
	  /*Inserting Data*/	
		$query="INSERT INTO Orders (ItemName, TableID,Quantity,OrderDate)VALUES('$ItemName','$TableID','$Quantity','$OrderDate');";
		
/*Updating Table Account*/	
$result2 = @mysqli_query($Conn,"SELECT ItemPrice FROM Menu WHERE ItemName = '$ItemName'");
	



$numrow= @mysqli_num_rows($result2);

if ($numrow>0){
$row= mysqli_fetch_array($result2);

$ItemPrice=$row['ItemPrice'];
$sum=$ItemPrice * $Quantity;
@mysqli_query($Conn,"UPDATE Tables SET Account=Account+'$sum' WHERE TableID='$TableID'");




echo"Table Account Updated! <br>";
}else{echo "no rows";}



/* End Ubdating table account*/
		
		if(@mysqli_query($Conn,$query))
			{
				  echo "Order added!";
$result3=@mysqli_query($Conn,"SELECT OrderID FROM Orders WHERE ItemName='$ItemName' AND TableID='$TableID' AND Quantity='$Quantity'");
$row2= mysqli_fetch_array($result3);
$OrderID=$row2['OrderID'];
$result3=@mysqli_query($Conn,"INSERT INTO `Orders-Tables`(`ItemName`, `Quantity`, `ItemPrice`, `TableID`, `OrderID`) VALUES ('$ItemName','$Quantity','$sum','$TableID','$OrderID')");
				  mysqli_close($Conn);
	  

			}else{ "Some Thing Went Wrong !";
	  
	  mysqli_close($Conn);}
	
	}
	}
	
	  

	
		

   	
	
		

?>
 
    </div>
     <div>
     <a style="color:#333" href="OrderList.php">Orders List</a>
    
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

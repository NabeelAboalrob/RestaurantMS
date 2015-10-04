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
<title>Modify order</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>

	<?php include ('Connection.php'); ?>
<?php $OrderDate=date("Y-m-d H:i:s");?>
<div class="container">
	<section id="content">
  
<?php $OrderID=$_GET['OrderID'];

	  $GQuantity=$_GET['Quantity'];

 ?>    
		<form id="form1" name="form1" method="post" action="">
        
        
			<h1>Modify Order</h1>
            
            
			 <div>

   <div> Item</div>
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
	<div>table #</div>
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
            
           <div>Quantity</div>
           <div>
   <?php        
	echo "<input type='text' id='Quantity' name='Quantity' required=''  placeholder='Quantity' value='$GQuantity' maxlength='11' />
		";?>
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
		$query="UPDATE Orders SET 
	ItemName='$ItemName',
	TableID='$TableID',
	Quantity='$Quantity',
	OrderDate='$OrderDate' WHERE OrderID='$OrderID'";


		if(@mysqli_query($Conn,$query))
			{
				  echo "Order Modified!";

			}else{ "Some Thing Went Wrong !";
			mysqli_close($Conn);}
	  
	  
	  
	  
	  
	  
	  /*updating other table*/
	  if($Quantity!=$GQuantity){
		  
		  if($Quantity>$GQuantity){
			    /*Get New Quantity Price*/
			  $result2 = @mysqli_query($Conn,"SELECT ItemPrice FROM Menu WHERE ItemName = '$ItemName'");
			  $row= mysqli_fetch_array($result2);
			  $ItemPrice=$row['ItemPrice'];
			  $sum=$ItemPrice * $Quantity;
			  $Gsum=$ItemPrice * $GQuantity;
			  /*End Get Price*/
			  $N=$sum-$Gsum; //I should add this
			  
			
		$query = "SELECT TableID FROM Tables WHERE TableID='{$TableID}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		
				if($num>0){@mysqli_query($Conn,"UPDATE Tables SET Account=Account+'$N' WHERE TableID=".$TableID);
							@mysqli_query($Conn,"UPDATE Orders SET ItemName='$ItemName', TableID='$TableID', Quantity='$Quantity', OrderDate='$OrderDate' ,OrderStatus='0' WHERE OrderID='$OrderID'");
							
				}
				
			    
			  }
		  if($Quantity<$GQuantity){
			    		    /*Get New Quantity Price*/
			  $result2 = @mysqli_query($Conn,"SELECT ItemPrice FROM Menu WHERE ItemName = '$ItemName'");
			  $row= mysqli_fetch_array($result2);
			  $ItemPrice=$row['ItemPrice'];
			  $sum=$ItemPrice * $Quantity;
			  $Gsum=$ItemPrice * $GQuantity;
			  /*End Get Price*/
			  $N=$Gsum-$sum; //I should sub this
			  
			
		$query = "SELECT TableID FROM Tables where TableID='{$TableID}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		
				if($num>0){@mysqli_query($Conn,"UPDATE Tables SET Account=Account-'$N' WHERE TableID=".$TableID);
							@mysqli_query($Conn,"UPDATE Orders SET ItemName='$ItemName', TableID='$TableID', Quantity='$Quantity', OrderDate='$OrderDate' ,OrderStatus='0' WHERE OrderID='$OrderID'");
							
				}
				
			  }
		  
		  }
		  
		  
		  
	  
	  /*End update Other Table*/
	  
	  
	  
	  
	  }
	
		}

   	
	
		

?>
 
    </div>
    <div> <a style="color:#333" href="OrderList.php">Back</a>
     </div>
     <div>
     <a style="color:#333" href="EmpLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

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
<title>Modify Goods Request</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>

	
<div class="container">
	<section id="content">
    
		<form id="form1" name="form1" method="post" action="">
        
        
			<h1>Modify Request</h1>
            
           
  
			 <div>

   <div> Item</div>
   <?php include ('Connection.php');
   
	$RequestID=$_GET['RequestID'];
	$GoodsName=$_GET['GoodsName'];
	$GoodsQuantity=$_GET['GoodsQuantity'];
	$Unit=$_GET['GoodsName'];
   
   
    ?>
   
   
   
   
    <select id='ItemName' name='ItemName'>
        <?php
		
		  
		  
        $query = "SELECT * FROM Goods";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){                                                 
            echo "<option value='".$row['GoodsName']."' >".$row['GoodsName']."</option>";
            }
        ?>          
    </select>
			</div>
            
            
           
           <div>
           
	<?php echo" <input type='text' id='GoodsQuantity' name='GoodsQuantity' required='' Value='$GoodsQuantity' placeholder='Quantity' maxlength='11' />";
	?>
    </div>
    <div>
		  <select id='Unit' name='Unit'>
                                                         
            <option value='G' >G</option>
              <option value='KG' >KG</option>
                <option value='Unit' >Unit</option>
                
    </select>
            </div>
			<div>
           
	<input type="submit" name="newrequest" id="newrequest" value="Request"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	

	
   if(isset($_POST["newrequest"]))
   {
	include ('Connection.php');
$ItemName=$_POST["ItemName"];
$Q=$_POST["GoodsQuantity"];
$U=$_POST["Unit"];

	if(!is_numeric($Q))
  {
   echo "Quantity Should Be Integer #";
  }else{
	  
	  /*Inserting Data*/	
			$query="UPDATE GoodsRequests SET 
	GoodsName='$ItemName',
	GoodsQuantity='$Q',
	Unit='$U'
 WHERE RequestID='$RequestID'";

		

		if(@mysqli_query($Conn,$query))
			{
				  echo "Request Modified!";	  

			}else{ "Some Thing Went Wrong !";
	  
	  mysqli_close($Conn);}
	
	}
	}
	
	  

	
		

   	
	
		

?>
 
    </div>
     <div>
     <a style="color:#333" href="GoodsRequestList.php">Requests List</a>
    
    </div>
    <div> <a style="color:#333" href="KitchenPage.php">Back To Kitchen Page</a>
     </div>
     <div>
     <a style="color:#333" href="EmpLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

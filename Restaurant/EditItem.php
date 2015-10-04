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
<title>Modify Items</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>


<div class="container">
  <section id="content">
    

	


<?php

$ItemID=0;

	$ItemID = $_GET['ItemID'];
	$ItemName=$_GET['ItemName'];
	$ItemPrice=$_GET['ItemPrice'];
	
	
	
	

		echo "<form id='form1' name='form1' method='post' action=''>
			<h1>Modify Item</h1>
			
       <div>Item name</div>
            <div>
				<input type='text' name='ItemName' required='' id='ItemName' placeholder='Item Name' value=".$ItemName." maxlength='15' />
			</div>
			 <div>Item price</div>
             <div>
				<input type='text' name='ItemPrice' required='' id='ItemPrice' placeholder='Item Price' value=".$ItemPrice."  maxlength='10' />
			</div>
			    
			<div>
				<input type='submit' name='modifyitem' id='modifyitem' value='Update'/>
			</div>
           
		</form>

 
		
	";	
	
	
	
	
?>

  <div><a style="color:#333" href='ItemsMenu.php'>Back</a></div>
  <div>
     <a  style="color:#333" href='EmpLogout.php'>Logout</a>
    
    </div>
    <?php
	
	
	
   if(isset($_POST['modifyitem']))
   {
	   
	   
$NItemName=$_POST["ItemName"];
$NItemPrice=$_POST["ItemPrice"];



		  
		  
		  
/* user name Syntax Validaion*/
if(preg_match("/^[0-9a-zA-Z]{2,}$/", $NItemName) === 0)
{
	echo "Item Name must be bigger that 3 chars and contain only digits, letters.";
	
	}
	
	else
	{

		
//price Validation
 
 if(!is_numeric($NItemPrice))
{
	echo "please Enter Valid Item Price ";
	
	}
	
	else
	{
 
				/*Updating Data*/	

include ('Connection.php');
  if(!$Conn){
     	  echo "no connection";}else{
		  
$query="UPDATE Menu
SET 
	ItemName='$NItemName',
	ItemPrice='$NItemPrice' WHERE ItemID='$ItemID'";
		if(@mysqli_query($Conn,$query))
			{
				  echo "record Updated!";

			}else {

     echo "something went wrong".mysqli_error();
					}
					
					
		  
					
					}
					
				
		}

				
		}

   }
	
   

?>
  
    
   	</section>

  <!-- content -->
</div>
<!-- container -->
</body>
 </div>
    <div> 
     </div>
     
  
</html>





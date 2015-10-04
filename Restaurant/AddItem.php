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
<title>Add Menu Items</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>


<div class="container">
	<section id="content">
		<form id="form1" name="form1" method="post" action="">
			<h1>Add Menu Items</h1>
			
            <div>
				<input type="text" name="ItemName" required="" id="ItemName" placeholder="Item Name" maxlength="15" />
			</div>
             <div>
				<input type="text" name="ItemPrice" required="" id="ItemPrice" placeholder="Item Price" maxlength="10" />
			</div>
          
			<div>
				<input type="submit" name="AddItem" id="AddItem" value="Submit"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	
	
	
   if(isset($_POST['AddItem']))
   {
	   
	   
$IName=$_POST["ItemName"];
$IPrice=$_POST["ItemPrice"];
 
include ('Connection.php');
		  
		  
/* user name Syntax Validaion*/
if(preg_match("/^[0-9a-zA-Z]{3,}$/", $IName) === 0)
{
	echo "Item Name must be bigger that 3 chars and contain only digits, letters.";
	
	}
	
	else
	{
		
/*Itemname Existance validation*/

		$query = "SELECT ItemID FROM Menu WHERE ItemName='{$IName}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		

if($num>0){
	echo "Item Name Exist";
	mysqli_close($Conn);
	}
	else{
		
//price Validation
 
 if(!is_numeric($IPrice))
{
	echo "please Enter Valid Item Price ";
	mysqli_close($Conn);
	}
	
	else
	{
 
 
 
				/*Inserting Data*/	
		$query="INSERT INTO Menu (ItemName, ItemPrice)VALUES('$IName','$IPrice');";


		if(@mysqli_query($Conn,$query))
			{
				  echo "Item added!";
					mysqli_close($Conn);
			}else {

     echo "something went wrong";
					mysqli_close($Conn);
					}
					
					
	}
					
					}
					
			
		}

				
		}

   	
	
		

?>
 
    </div>
      <div>
     <a style="color:#333" href="ItemsMenu.php">View Menu</a>
    
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

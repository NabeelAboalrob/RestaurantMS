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
<title>Modify Goods</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>
 <?php 
   
	$GoodsID=$_GET['GoodsID'];
	$GoodsName=$_GET['GoodsName'];
	
   
    ?>
	
<div class="container">
	<section id="content">
 
		<form id="form1" name="form1" method="post" action="">
        
        
			<h1>Modify Goods</h1>
            
            
			 <div>

  
   
  
           <div>Goods Name</div>
	<?php 
	echo "<input type='text' id='GoodsName' name='GoodsName' required=''  placeholder='GoodsName' maxlength='20' value='$GoodsName' />"; ?>
    
		  
            </div>
			<div>
           
	<input type="submit" name="Add" id="Add" value="Modify"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	

	
   if(isset($_POST["Add"]))
   {
	include ('Connection.php');
$GoodsName=$_POST["GoodsName"];


	
	if(is_numeric($GoodsName))
  {
   echo "Please Enter Valid Name";
  }else{
	  
	  
	  
	  if(preg_match("/^[a-zA-Z0-9]{3,}$/", $GoodsName)=== 0)
{
	echo "Goods Name must be bigger that 3 chars and contain only digits, letters.";
	
	}
	
	else
	{
	  
	  /*Updating Data*/	
		$query="UPDATE Goods SET 
	GoodsName='$GoodsName'
 WHERE GoodsID='$GoodsID'";


		if(@mysqli_query($Conn,$query))
			{
				  echo "Goods Modified !";	  

			}else{ "Some Thing Went Wrong !";
	  
	  mysqli_close($Conn);}
	
	}
	}
	
	  

	
		

   	
	
		
   }
?>
 
    </div>
     <div>
     <a style="color:#333" href="GoodsList.php">Goods List</a>
    
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

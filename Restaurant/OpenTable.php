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
<title>Open Table</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>


<div class="container">
	<section id="content">
		<form id="form1" name="form1" method="post" action="">
			<h1>Open Table</h1>
			
            <div>
				<input type="text" name="TableID" required="" id="TableID" placeholder="TableID" maxlength="11" />
			</div>
           <note>If The Table Dosen't Exist New Table Will Be Created.</note>	
			<div>
				<input type="submit" name="OpenTable" id="OpenTable" value="Submit"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	
	
	
   if(isset($_POST['OpenTable']))
   {
	   
	   
$TableID=$_POST["TableID"];


include ('Connection.php');
		  
	 if(!is_numeric($TableID))
{
	echo "please inter proper ID ";
	
	}
	
	else
	{	  
		  


		$query = "SELECT TableID,Account FROM Tables WHERE TableID='{$TableID}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if($row['Account']>0){echo"<c style='color:red'>Table's Still Opened !</c>";}else{

if($num>0){
		@mysqli_query($Conn,"UPDATE Tables SET Account=0 WHERE TableID='$TableID'");
		echo "Table Opened!";
		mysqli_close($Conn);
	/*Inserting Data*/
}else{
if($num==0){

				@mysqli_query($Conn,"INSERT INTO Tables (TableID, Account)VALUES('$TableID',0);");
				echo "New Table Opened!";
				mysqli_close($Conn);
}
else{			
	 echo "something went wrong";				
	 mysqli_close($Conn);					
		}

}

	
	
					
			
		}
   }
   }
?>
 
    </div>
   
    <div> <a style="color:#333" href="EmpPage.php">Back To Employees Page</a>
     </div>
     <div>
     <a style="color:#333" href="EmpLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

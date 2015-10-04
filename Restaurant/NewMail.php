<?php session_start();

if(!isset($_SESSION["user1"])) 
{if(!isset($_SESSION['user2']))

{
	
	{header("location:Index.php");
	
	
	}


}
}



 ?>
 <!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>New Mail </title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>

	
<div class="container">
	<section id="content">
    
<?php 
$Date=date("Y-m-d H:i:s");
$FullName=$_GET['FullName'];		

?>    
		<form id="form1" name="form1" method="post" action="">
        
        
			<h1>New Mail</h1>
            <div>To</div>
            
			 <div>

   <?php include ('Connection.php'); ?>
    <select id="Resever" name="Resever">
         <option value='Admin' >Admin</option>
		<?php
		
		  
		  
        $query = "SELECT * FROM Employee";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){             echo"  <option value='".$row['Fname']." ".$row['Lname']."' >".$row['Fname']." ".$row['Lname']."</option>";}
        ?>
                  
    </select>
			</div>
        
          
           <div>
            
	<input type="text" id="Subject" name="Subject" required=""  placeholder="Subject" maxlength="40"/>
		
            </div>
        <div>Message Text</div>
        <div>
        <textarea cols="40" rows="7" name="Text" Id="Text"></textarea>
        
        
        
        </div>
			<div>
           
	<input type="submit" name="newmail" id="newmail" value="send"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	

	
   if(isset($_POST["newmail"]))
   {
	include ('Connection.php');
$Resever=$_POST["Resever"];
$Subject=$_POST["Subject"];
$Text=$_POST["Text"];
 
	
	
	  /*Inserting Data*/
	
		$query="INSERT INTO Mail (Sender, Resever, Subject, Text, Status, Date) VALUES ('$FullName','$Resever','$Subject','$Text','U','$Date');";
		
	



		if(@mysqli_query($Conn,$query))
			{
				  echo "Mail is Sended!";

				  mysqli_close($Conn);
	  

			}else{ "Some Thing Went Wrong !";
	  
	  mysqli_close($Conn);}
	
	}
	
	
	  

	
		

   	
	
		
 
?>
 <div> <?php echo"<a style='color:#666; font: bold 20px Helvetica, Arial, sans-serif;' href='javascript:window.close();'>close</a><br>";?>
 </div>
    </div>
    
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

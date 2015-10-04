
<?php
session_start();
if(!isset($_SESSION["user1"])){ 
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
<title>Incomes</title>
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
        <h1>Incomes</h1>
<div>

<form name="form2" method="post" action="">  <c style='color:orange'>View Incomes From</c> <input type="date" name="Fdate" required="" ><c style='color:orange'> TO </c> <input type="date" name="Ldate" Required="" ><c style='color:orange'> ►</c> <input type="submit" name="SearchDate" value="Go">


   </form>
   <br><br>
   <form name="WipeForm" method="post" action="">
	   
<input type='submit' name='Wipe' id='Wipe' value='Wipe' />    
   </form>
   <?php
   if (isset($_POST['Wipe'])){
				 echo "<br><a Style='color:orange'>This Command Will Wipe All Income History, </a><d style='color:red'>Are You Sure ?</d>";
				 echo "<br><br> <form name='WipeConfirm' method='post' action=''>
							<input type='submit' name='WipeConfirm' id='WipeConfirm' value='OK !' />
							<input type='submit' name='Cancel' id='Cancel' value='Cancel' />    
							</form>";
				 
				 
				 }
   ?>
   <?php
   if (isset($_POST['WipeConfirm'])){
	   include ('Connection.php');
 
    
 
@mysqli_query($Conn,"TRUNCATE Income");
 mysqli_close($Conn);

	   
	   }elseif (isset($_POST['Cancel'])){
		   
		   
		   }
   ?>
<br> 
  -----------------------------------------------------
   </div>
   
   <br> 
  
 
<?php			 
			 		
		 if (isset($_POST['SearchDate'])){
			
			 $Fdate=$_POST['Fdate'];
			 $Ldate=$_POST['Ldate'];
			 
			  //Custom SearchDate
include ('Connection.php');
echo"<c style='color:orange'>Incomes From <c style='color:red;'>$Fdate</c> To <c style='color:red;'>$Ldate</c></c><br><br>";
$result = @mysqli_query($Conn,"SELECT * FROM Income WHERE Date BETWEEN '$Fdate' AND '$Ldate';");

echo "<center><table id='t'  border='2' \>
<tr>
<th><c style='color:orange'>Date</c></th>
<th><c style='color:orange'>Ammount</c></th>
</tr>";
$sum=0;
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Date'] . "</td>";
   echo "<td>" . $row['Amount'] . "</td>"; 
  echo "</tr>";
$sum=$sum+$row['Amount'];
}

echo "<tr><td><c style='color:orange'>Sum</c></td><td>$sum</td></tr>
<tr><td><a href='PrintIncome.php?Fdate=$Fdate&Ldate=$Ldate' target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td></tr>
</table><br>-----------------------------------------------------<br>";
 

 
mysqli_close($Conn);	 
	 
	 
	 
	 //end date search
			 
			 
			 
			 
			 
			 
			 
			 }
		 



		 ?>

</div>



<div> <a style="color:#333" href="AdminPage.php">Back To Admin Page</a>
     </div>
     <div>
     <a style="color:#333" href="AdminLogout.php">Logout</a>
    
    </div>
	</section><!-- content -->
</div><!-- container -->


</body>
</html>

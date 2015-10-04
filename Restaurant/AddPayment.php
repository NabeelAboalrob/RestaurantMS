<?php session_start();

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
<title>Add Payment</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />

</head>
<body>

	
<div class="container">
	<section id="content">
    
<?php 
$Pdate=date("Y-m-d");
$Ptime=date("H:i:s");

?>    
		<form id="form1" name="form1" method="post" action="">
        
        
			<h1>New Payment</h1>
            
            
			 <div>

   <div><c style="color:orange">Choose Payment Type !</c></div><c style="color:orange">▼</c><br>
   <?php include ('Connection.php'); ?>
    <select id='PaymentType' name='PaymentType'>
                              
   <option value='EmployeeSalary'>Employee Salary</option>
  <option value='Other'>Other</option>    
            
              
    </select>
			</div>
        
	<input type="submit" name="type" id="type" value="OK"/>
			
           
		</form><!-- form -->
	<div>
    <div>
	<?php
	
	
   if(isset($_POST["type"]))
   {
	
$T=$_POST["PaymentType"];

		if($T=='EmployeeSalary'){
			
			
			echo"<form id='form1' name='form1' method='post' action=''>
			<h1>Employees Payment</h1>
            <div>
				<select id='EmployeeID' name='EmployeeID'>
        ";
		
		  
		  
        $query = "SELECT EID,Fname,Lname FROM Employee";
        $result = mysqli_query($Conn,$query);  
          
			while($row=mysqli_fetch_array($result)){                                                 
          echo"  <option value='".$row['EID']."' >".$row['Fname']." ".$row['Lname']."</option>";}
            
            
  echo"            
    </select>
			</div>			
            <div>
				<input type='text' name='PaymentAmount' required='' id='PaymentAmount' placeholder='Amount' maxlength='11' />
			</div>
            

            <div>
	    <div>
				<input type='text' name='PaymentDiscription' id='PaymentDiscription' placeholder='Payment Discription' maxlength='30' />
			</div>
            

            <div>
			<div>
				<input type='submit' name='addemployeepayment' id='addemployeepayment' value='Add!'/>
			</div>
           
		</form><!-- form -->
			";}
		
		
		
	
		
		
		if($T=='Other'){
		echo"<form id='form1' name='form1' method='post' action=''>
			<h1>Payment</h1>
       			
            <div>
				<input type='text' name='PaymentAmount' required='' id='PaymentAmount' placeholder='Amount' maxlength='11' />
			</div>
            

            <div>
	    <div>
				<input type='text' name='PaymentDiscription' id='PaymentDiscription' placeholder='Payment Discription' maxlength='30' required='' />
			</div>
            

            <div>
			<div>
				<input type='submit' name='addotherpayment' id='addotherpayment' value='Add'/>
			</div>
           
		</form><!-- form -->
			";}
		
		
		
		
	
		
		
		
		
		
		
		
		
	  

	
		
  	
   }
		

?>
</div>

<?php
//InsertEmployee Salary Payment 
if(isset($_POST['addemployeepayment'])){
$PaymentAmount=$_POST['PaymentAmount'];
$EmployeeID=$_POST['EmployeeID'];
$PaymentDiscription=$_POST['PaymentDiscription'];

		if(!is_numeric($PaymentAmount))
		{
			echo"Please Enter Valid Amount";
		}else{
			
			
			$NameQuery=@mysqli_query($Conn,"SELECT Fname,Lname FROM Employee WHERE EID='$EmployeeID'");
while($row=mysqli_fetch_array($NameQuery)){
$Fname=$row['Fname'];
$Lname=$row['Lname'];
$EmployeeName=$Fname." ".$Lname;
}

$query="INSERT INTO Payments (PaymentType,PaymentAmount,PaymentDate,PaymentTime,EID,EmployeeName,PaymentDiscription)VALUES('EmployeeSa','$PaymentAmount','$Pdate','$Ptime','$EmployeeID','$EmployeeName','$PaymentDiscription');";
		

		if(@mysqli_query($Conn,$query))
			{
				  echo "Payment added!<br>";	  
					echo"<a style='color:Blue' href='EmployeePaymentList.php'>List Payments</a>";
			}else{ "Some Thing Went Wrong !";

}
			
			}
			
			
			}



//Insert Other Paymentt
if(isset($_POST['addotherpayment'])){
$PaymentDiscription=$_POST['PaymentDiscription'];
$PaymentAmount=$_POST['PaymentAmount'];

if(preg_match("/^[0-9a-zA-Z ]{4,}$/", $PaymentDiscription) === 0)
{
	echo "Discription must be bigger that 4 chars and contain only digits and letters.";
	
	}
	
	else
	{
		if(!is_numeric($PaymentAmount))
		{
			echo"Please Enter Valid Amount";
		}else{
	$query="INSERT INTO Payments (PaymentType,PaymentAmount,PaymentDate,PaymentTime,PaymentDiscription)VALUES('Other','$PaymentAmount','$Pdate','$Ptime','$PaymentDiscription');";
		

		if(@mysqli_query($Conn,$query))
			{
				  echo "Payment added! <br>";
				  echo"<a style='color:Blue' href='EmployeePaymentList.php'>List Payments</a>";
			}else{ "Some Thing Went Wrong !";

}
	
	
	
	
		}}
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

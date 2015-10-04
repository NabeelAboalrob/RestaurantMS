
<?php session_start();

if(!isset($_SESSION["user2"])){ 
header("location:Index.php");
 		 } 
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employees</title>

<link rel="stylesheet" href="css/AdminCss.css" type="text/css" media="screen">


<link href="css/Main.css" rel="stylesheet" type="text/css">



<style type="text/css">
h1,h2,h3,h4,h5,h6 {
	font-family: BebasNeueRegular, Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>
<div id="outer">
<div id="container">
<div id="content"> 
	<h1>Restaurant Management System</h1> 
    <form method="post" action="">
    <input type="submit" name="ChickIn" value="ChickIn"><br>▼<br>
    <input type="submit" name="Kitchen" value="Kitchen Page"><br><br>
    <input type="submit" name="Employees" value="Employees Page">
    
   
    </form>
	<div><br>
    <?php 

		
		if(isset($_POST['Employees']))
{
header("location: EmpPage.php");
 		 }
	


?><?php	
if(isset($_POST['Kitchen']))
{
header("location: KitchenPage.php");}
 		 

			
	
	
	
	
    
   ?>
   
      <?php

//Retrieving ID			
			include("Connection.php");
			$username=$_SESSION["user2"];
     $NameQuery=@mysqli_query($Conn,"SELECT EID FROM Employee WHERE UserName='$username'");
while($row=mysqli_fetch_array($NameQuery)){
$EmployeeID=$row['EID'];
}
mysqli_close($Conn);


?>   
   <?php
   
   
   
   if(isset($_POST['ChickIn']))
{




$D=date("Y-m-d");
$Date=date("Y-m-d h:i:s");


include ('Connection.php');
		  
		
		  
	
		$query="INSERT INTO Attendance (EID,AttendanceDate,Date)VALUES('$EmployeeID','$Date','$D');";

$result=@mysqli_query($Conn,"SELECT AttendanceID FROM Attendance WHERE Date='$D' AND EID='$EmployeeID'");

$num= @mysqli_num_rows($result);
if($num>0){
	
	 echo "<c style='color:red'>You're Already Checked In Today!</c><br><br>";
	
	}else{
		if(@mysqli_query($Conn,$query))
			{
				  echo "<c style='color:green'>Checked!</c><br><br>";
					mysqli_close($Conn);
			}else {

     echo "<c style='color:red'>Something went wrong</c><br><br>";
					mysqli_close($Conn);
					
			}}}
	?> 
 <a href="EmpLogout.php">LogOut</a></div>
    </div>
	</div> 
  
	<div class="clearer"></div> 
	
    
    </div>

    <div class="clear"></div>
    <!-- Start Footer Bottom -->
<div id="footerbottom">
    
    	<div class="footerwrap">
        
        	<!-- Start Copyright Div -->
            <div id="copyright">&copy;2014.Nabeel Aboalrob - All rights reserved!
            
         
          </div>
           
            
            <!-- End Copyright Div -->

            <!-- Start Social area -->
            <div class="socialfooter">
                
                <ul>
                
                <li><a href="https://www.facebook.com/AboAlrobNabeel" class="social-facebook" target="_blank"></a></li>
                <li><a href="https://twitter.com/nabeelaboalrob" class="social-twitter" target="_blank"></a></li>
                <li><a href="http://www.linkedin.com/in/nabeelaboalrob" class="social-linkedin" target="_blank"></a></li>
               
                </ul>
                
            </div>
            <!-- End Socialarea -->
        
        </div>
    
    </div>
    <!-- End Footer Bottom -->
</div>
<!-- End Footer -->
<!-- Start Scroll To Top Div -->
<!-- End Scroll To Top Div -->
</body>
</html>

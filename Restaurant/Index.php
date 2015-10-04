<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurant Mgmt. System</title>

<link rel="stylesheet" href="css/Index.css" type="text/css" media="screen">


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
    <input type="submit" name="Admin" value="Admin Login"><br><br>
    <input type="submit" name="Employees" value="Employees Login"><br><br>
    </form>
	<div><br>
    <?php 
	
	if(isset($_POST['Admin']))
{
	if(isset($_SESSION["user1"])){ 
header("location: AdminPage.php");
 		 } else{
echo"	<center><form id='form1' name='form1' method='post' action='' style='width:500px'>
			<c style='color:orange;font-size:20px;font-weight:bold'>Admin Login</c><br><br>
			
            <div>
			  <input type='text' name='username' required='' id='username' placeholder='User Name' maxlength='20' />
		  </div>
        
			<div>
				<input type='password' name='password' required='' id='password'  placeholder='Password' maxlength='20' />
			</div>
			<div>
				<input type='submit' name='AdminLogin' id='login' value='Login'/>
				
			</div>
		</form></center><!-- form -->
		<div>";
		
		
        

	
		 }
	}else{
		
		if(isset($_POST['Employees']))
{if(isset($_SESSION["user2"])){ 
header("location: EmpPage0.php");
 		 } else{
	
echo"	<center><form id='form1' name='form1' method='post' action='' style='width:500px'>
			<c style='color:orange;font-size:20px;font-weight:bold'>Employees Login</c><br><br>
			
            <div>
			  <input type='text' name='username' required='' id='username' placeholder='User Name' maxlength='20' />
		  </div>
        
			<div>
				<input type='password' name='password' required='' id='password'  placeholder='Password' maxlength='20' />
			</div>
			<div>
				<input type='submit' name='EmployeeLogin' id='EmployeeLogin' value='Login'/>
				
			</div>
		</form></center><!-- form -->
		<div>";
		
		
        
		 }

}
		}	
	
	
	
	
    
   ?> 
  <?php  
    if(isset($_POST['AdminLogin'])){
		
		
$user=$_POST["username"];
$pass=$_POST["password"];
include ('Connection.php');

		$query = "SELECT ID FROM Admin WHERE AdminName='{$user}' AND AdminPassword='{$pass}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		

if($num>0){
	$_SESSION["user1"]=$user;
		
		mysqli_close($Conn);
		
			header("location: AdminPage.php");
			
			}
			 
		
	
	else{echo "<c style='color:red;font-size:20px;font-weight:bold'>Invalid Username or Password</c>";}
}
?>



 <?php
if(isset($_POST['EmployeeLogin'])){
$user=$_POST["username"];
$pass=$_POST["password"];

include ('Connection.php');

		$query = "SELECT EID FROM Employee WHERE UserName='{$user}' AND EPassword='{$pass}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		

if($num>0){
	$_SESSION["user2"]=$user;
		mysqli_close($Conn);
		header("location: EmpPage0.php");
	}
	else{
		echo "<c style='color:red;font-size:20px;font-weight:bold'>Invalid Username or Password</c>";
		mysqli_close($Conn);
		}
}
?>


 

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

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
<title>Modify employee</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>


<div class="container">
  <section id="content">
    

	


<?php

$eid=0;

	$eid = $_GET['eid'];
	$fname=$_GET['Fname'];
	$lname=$_GET['Lname'];
	$username=$_GET['username'];
	$password=$_GET['password'];
	$email=$_GET['email'];
	
	
	

		echo "<form id='form1' name='form1' method='post' action=''>
			<h1>Modify Employees</h1>
			
       <div>Firstname</div>
            <div>
				<input type='text' name='firstname' required='' id='firstname' placeholder='First Name' value='$fname' maxlength='20'/>
			</div>
			<div>Lastname</div>
             <div>
				<input type='text' name='lastname' required='' id='lastname' placeholder='Last Name' value='$lname' maxlength='20' />
			</div>
			    <div>Username</div>
				 <div>
			
				<input type='text' name='username' required='' id='username' placeholder='Username' value='$username' maxlength='20'/>
			</div>
			<div>Password</div>
			<div>
				<input type='password' name='password' required='' id='password' placeholder='Password' value='$password' maxlength='20' />
			</div>
                  <div>E-mail</div>
				    <div>
				<input type='text' name='email' required='' id='email' placeholder='E-Mail' value='$email' maxlength='100' />
			</div>
			<div>
				<input type='submit' name='modifyemployee' id='modifyemployee' value='Update'/>
			</div>
           
		</form>

 
		
	";	
	
	
	
	
?>

 
    <?php
	
	
	
   if(isset($_POST['modifyemployee']))
   {
	   
	   
$Nuser=$_POST["username"];
$Npass=$_POST["password"];
$Nfname=$_POST["firstname"];
$Nlname=$_POST["lastname"];
$Nemail=$_POST["email"];

include ('Connection.php');
		  
		  
/* user name Syntax Validaion*/
if(preg_match("/^[0-9a-zA-Z_]{5,}$/", $Nuser) === 0)
{
	echo "UserName must be bigger that 5 chars and contain only digits, letters and underscore.";
	
	}
	
	else
	{
		

		/* email validation*/
		if(filter_var($Nemail,FILTER_VALIDATE_EMAIL))
				{
				/*Updating Data*/	
$query="UPDATE Employee
SET 
	Fname='$Nfname',
	Lname='$Nlname',
	UserName='$Nuser',
	EPassword='$Npass',
	EMail='$Nemail' WHERE EID='$eid'";
		if(@mysqli_query($Conn,$query))
			{
				  echo "record Updated!";
				  mysqli_close($Conn);

			}else {

     echo "something went wrong".mysqli_error();
					mysqli_close($Conn);
					}
					
					
					
					
					}
					
					else{echo "Please Enter Valid E-Mail";
					mysqli_close($Conn);
					}
		}

				
		}


	
  

?>
  <div><a style="color:#333" href='EmpList.php'>Back</a></div>
  <div>
     <a  style="color:#333" href='AdminLogout.php'>Logout</a>
    
    </div> 
    
   	</section>

  <!-- content -->
</div>
<!-- container -->
</body>
 </div>
    <div> 
     </div>
     
  
</html>













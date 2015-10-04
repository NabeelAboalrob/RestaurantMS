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
<title>Add employee</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>


<div class="container">
	<section id="content">
		<form id="form1" name="form1" method="post" action="">
			<h1>Add Employees</h1>
			
            <div>
				<input type="text" name="firstname" required="" id="firstname" placeholder="First Name" maxlength="20" />
			</div>
             <div>
				<input type="text" name="lastname" required="" id="lastname" placeholder="Last Name" maxlength="20"/>
			</div>
            <div>
				<input type="text" name="username" required="" id="username" placeholder="Username" maxlength="20"/>
			</div>
			<div>
				<input type="password" name="password" required="" id="password" placeholder="Password" maxlength="20"/>
			</div>
                    <div>
				<input type="text" name="email" required="" id="email" placeholder="E-Mail" maxlength="100"/>
			</div>
			<div>
				<input type="submit" name="addemployee" id="addemployee" value="Submit"/>
			</div>
           
		</form><!-- form -->
	<div>
    <?php
	
	
	
   if(isset($_POST['addemployee']))
   {
	   
	   
$user=$_POST["username"];
$pass=$_POST["password"];
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
$email=$_POST["email"];

include ('Connection.php');
		  
		  
		  
/* user name Syntax Validaion*/
if(preg_match("/^[0-9a-zA-Z_]{5,}$/", $user) === 0)
{
	echo "User must be bigger that 5 chars and contain only digits, letters and underscore.";
	
	}
	
	else
	{
		
/*username Existance validation*/

		$query = "SELECT Eid FROM Employee where UserName='{$user}'";
		$result = @mysqli_query($Conn,$query); 
		$num= @mysqli_num_rows($result);
		

if($num>0){
	echo "User Name Exist";
	}
	else{
		/* email validation*/
		if(filter_var($email,FILTER_VALIDATE_EMAIL))
				{
				/*Inserting Data*/	
		$query="INSERT INTO Employee (Fname, Lname,UserName,EPassword,Email)VALUES('$fname','$lname','$user','$pass','$email');";


		if(@mysqli_query($Conn,$query))
			{
				  echo "record added!";
					mysqli_close($Conn);
			}else {

     echo "something went wrong";
					mysqli_close($Conn);
					}
					
					
					
					
					}
					
					else{echo "Please Enter Valid E-Mail";
					mysqli_close($Conn);
					}
		}

				
		}


	
			
	}
		

?>
 
    </div>
      <div>
     <a style="color:#333" href="EmpList.php">Employees List</a>
    
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

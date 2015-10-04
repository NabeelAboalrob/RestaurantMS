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
<title>Change Admin Password</title>
<link rel="stylesheet" type="text/css" href="css/LogStyle.css" />
</head>
<body>


<div class="container">
  <section id="content">
    
<form id='form1' name='form1' method='post' action=''>
        	<h1>Change Pass</h1>
			<div>
				<input type='password' name='oldpassword' required='' placeholder='Old Password' maxlength='20' />
			</div>
        <div>
				<input type='password' name='newpassword1' required='' placeholder='New Password'  maxlength='20' />
			</div>
            <div>
				<input type='password' name='newpassword2' required='' placeholder='Confirm New Password'  maxlength='20' />
			</div>
        
			<div>
				<input type='submit' name='ChangePass' value='OK'/>
			</div>
           
		</form>
 
    <?php
	
	
	
   if(isset($_POST['ChangePass']))
   {
	   
	   
$Opass=$_POST["oldpassword"];
$Npass1=$_POST["newpassword1"];
$Npass2=$_POST["newpassword2"];


include ('Connection.php');
   
   $o=@mysqli_query($Conn,"SELECT AdminPassword FROM Admin");
   $row=mysqli_fetch_array($o);
   if($row['0']!=$Opass){
	   echo"Incorrect Old Password!";

   }else{
	   
	   if($Npass1!=$Npass2){echo"New Password Confirm Did not Match!";}else{
		   
		   
		   
		   
		   @mysqli_query($Conn,"UPDATE Admin SET AdminPassword='$Npass1' WHERE AdminName='Admin'");
		echo"<c style='color:green'>Changed!</c>";
		
		
		   }
	   
	   
	   }
   
   
   }

	
  

?>
  <div><a style="color:#333" href='AdminPage.php'>Back</a></div>
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













<?php session_start();

if(!isset($_SESSION["user2"])){ 
header("location:Index.php");
 		 } 
 

 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employees Page</title>

<link rel="stylesheet" href="css/AdminCss.css" type="text/css" media="screen">
<link href="css/Main.css" rel="stylesheet" type="text/css">

<?php $name=$_SESSION["user2"]; ?>
</head>
<body> 
<div id="outer">
<div id="container">
<div id="content">
<div>
	<center><c style="color:#7E7E7E;font-size:20px;font-weight:bold">Employee Panel</c> </center>
     </div>   
	<div class="navwrap"> 
        
		<ul> 
		  <li><center><a href="NewOrder.php">&nbsp;&nbsp;New Order&nbsp;&nbsp;</a></center></li> 
		  <li><center><a href="OrderList.php">&nbsp;&nbsp;Order List&nbsp;&nbsp;</a></center></li>
           <li><center><a href="OpenTable.php">&nbsp;&nbsp;Open Table&nbsp;&nbsp;</a></center></li>
            <li><center><a href="CloseTable.php">&nbsp;&nbsp;Close Table&nbsp;&nbsp;</a></center></li>
           <li><center><a href="AddItem.php">&nbsp;&nbsp;Add Menu Items&nbsp;&nbsp;</a></center></li> 
            <li><center><a href="ItemsMenu.php">&nbsp;&nbsp;Items Menu&nbsp;&nbsp;</a></center></li> 
              <br><center> <a style="color:#666; font: bold 20px Helvetica, Arial, sans-serif;">Mail</a><br></center>
    
                 <?php
			
			include("Connection.php");
			$username=$_SESSION["user2"];
     $NameQuery=@mysqli_query($Conn,"SELECT Fname,Lname FROM Employee WHERE UserName='$username'");
while($row=mysqli_fetch_array($NameQuery)){
$Fname=$row['Fname'];
$Lname=$row['Lname'];
$EmployeeName=$Fname." ".$Lname;
}
mysqli_close($Conn);


?>
			
			
			<?php 
			 echo"<li><center><a href='NewMail.php?FullName=".$EmployeeName."' target='_blank'>&nbsp;&nbsp;New Mail&nbsp;&nbsp;</a></center></li>
	  <li><center><a href='Inbox.php?FullName=".$EmployeeName."' target='_blank'>&nbsp;&nbsp;Inbox&nbsp;&nbsp;</a></center></li> 
	 
		";	 
	?>
    
		</ul> 
	</div> 
	<div class="clearer"></div>
     ..................................................<br>
    <a style="color:#666; font: bold 20px Helvetica, Arial, sans-serif;">Notifications</a><br>
     <?php 
include("Connection.php");
$result = @mysqli_query($Conn,"SELECT count(*) FROM Mail WHERE Resever='".$EmployeeName."' AND Status='U'");

while($row = mysqli_fetch_array($result)) {
 
 $count=$row[0];
 if($count==1){ echo "<a href='Inbox.php?FullName=".$EmployeeName."' target='_blank' style='color:orange;'>● One New Message</a><br>" ;
}
 
 
 else{
 if($count>0){
 echo "<a href='Inbox.php?FullName=".$EmployeeName."' target='_blank' style='color:orange;'>● $count New Messages.</a><br>" ;
 }
}}
 
  
  
 
mysqli_close($Conn);
?>
    ..................................................<br> <br><br>
	<a href="ChangeEmployeePass.php" style="font-size:13px; font-weight:bold">Change UR Password</a><br>
    <a href="EmpPage0.php">Back</a><br>
    <a href="EmpLogout.php">LogOut</a></div>
    
    </div>
	</div>
    
	<div class="clearer"></div> 
	
    
    </div>

    
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
<div id="scrolltab"></div>
<!-- End Scroll To Top Div -->
</body> 
</html>

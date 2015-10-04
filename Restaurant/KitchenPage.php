<?php session_start();

if(!isset($_SESSION["user2"])){ 
header("location:Index.php");
 		 } 
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kitchen Page</title>

<link rel="stylesheet" href="css/AdminCss.css" type="text/css" media="screen">

<link href="css/Main.css" rel="stylesheet" type="text/css">

</head>
<body> 
<div id="outer">
<div id="container">
<div id="content"> 
	<h1>kitchen Panel</h1> 
	<div class="navwrap"> 
		<ul> 
		  <li><center><a href="KitchenOrderList.php">&nbsp;&nbsp;Order List&nbsp;&nbsp;</a></center></li> 
		  <li><center><a href="GoodsRequest.php">&nbsp;&nbsp;Request Goods&nbsp;&nbsp;</a></center></li> 
           <li><center><a href="GoodsRequestList.php">&nbsp;&nbsp;Requested Goods List&nbsp;&nbsp;</a></center></li>
           <li><center><a href="AddNewGoods.php">Add &nbsp;&nbsp;New Goods&nbsp;&nbsp;</a></center></li> 
           <li><center><a href="GoodsList.php">&nbsp;&nbsp;Goods List&nbsp;&nbsp;</a></center></li>  
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
    <?php include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT count(*) FROM Orders WHERE OrderStatus='0'");

while($row = mysqli_fetch_array($result)) {
 
 $count=$row[0];
 if($count==1){ echo "<a href='KitchenOrderList.php'  style='color:orange;'>● One Order Pending.</a><br>" ;
}
 
 
 else{
 if($count>0){
 echo "<a href='KitchenOrderList.php' style='color:orange;'>● $count Orders Pending.</a><br>" ;
 }
}}
 
  
  
 

?>
 <?php 

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
    ..................................................<br>
    <a href="EmpPage0.php">Back</a><br>
	<a href="EmpLogout.php">LogOut</a></div>
    
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

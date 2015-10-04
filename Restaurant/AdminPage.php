<?php session_start();

if(!isset($_SESSION["user1"])){ 
header("location:Index.php");
 		 } 
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
<link href="css/Main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/AdminCss.css" type="text/css" media="screen">
</head>

<body> 
<div id="outer">
<div id="container">
<div id="content"> 
	<center><c style="color:#7E7E7E;font-size:20px;font-weight:bold">Admin Panel</c> </center>
     
	<div class="navwrap"> 
		<ul> 
		  <li><center><a href="AddEmployee.php">&nbsp;&nbsp;Add Employees&nbsp;&nbsp;</a></center></li> 
		  <li><center><a href="EmpList.php">&nbsp;&nbsp;Employees List&nbsp;&nbsp;</a></center></li> 
           <li><center><a href="AdminRequestList.php">&nbsp;&nbsp;Requested Goods List&nbsp;&nbsp;</a></center></li> 
            <li><center><a href="AddPayment.php">&nbsp;&nbsp;New Payment&nbsp;&nbsp;</a></center></li> 
              <li><center><a href="EmployeePaymentList.php">&nbsp;&nbsp;Payments&nbsp;&nbsp;</a></center></li> 
               
              <li><center><a href="AttendancePage.php">&nbsp;&nbsp;Attendance Report&nbsp;&nbsp;</a></center></li>
                      <li><center><a href="Income.php">&nbsp;&nbsp;Restaurant's Income&nbsp;&nbsp;</a></center></li>
              <br><center> <a style="color:#666; font: bold 20px Helvetica, Arial, sans-serif;">Mail</a><br></center>       <li><center><a href='NewMail.php?FullName=Admin' target='_blank'>&nbsp;&nbsp;New Mail&nbsp;&nbsp;</a></center></li> 
	  <li><center><a href='Inbox.php?FullName=Admin' target='_blank'>&nbsp;&nbsp;Inbox&nbsp;&nbsp;</a></center></li> 
	 
		</ul>
       
	</div> 
     
	<div class="clearer"></div> 
...................................................<br>
    <a style="color:#666; font: bold 20px Helvetica, Arial, sans-serif;">Notifications</a><br>

<div id="show">
    <?php include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT count(*) FROM GoodsRequests");

while($row = mysqli_fetch_array($result)) {
 
 $count=$row[0];

 if($count==1){ echo "<a href='AdminRequestList.php' style='color:orange;'>● One Good Request.</a><br>" ;
}
 
 
 else{

 if($count>0){
 echo "<a href='AdminRequestList.php' style='color:orange;'>● $count Good Requests.</a><br>" ;
 }
}}
 
  
  
 
?>
  <?php 

$result = @mysqli_query($Conn,"SELECT count(*) FROM Mail WHERE Resever='Admin' AND Status='U'");

while($row = mysqli_fetch_array($result)) {
 
 $count=$row[0];
 if($count==1){ echo "<a href='Inbox.php?FullName=Admin' target='_blank' style='color:orange;'>● One New Message</a><br>" ;
}
 
 
 else{
 if($count>0){
 echo "<a href='Inbox.php?FullName=Admin' target='_blank' style='color:orange;'>● $count New Messages.</a><br>" ;
 }
}}
 
  
  
 

?>

<?php
//attendance Check
$date=date("Y-m-d");
$AbsenceCount=0;
 $count=0;
     $NameQuery=@mysqli_query($Conn,"SELECT EID FROM Employee");
while($row=mysqli_fetch_array($NameQuery)){
$EmployeeID=$row['EID'];

$result = @mysqli_query($Conn,"SELECT AttendanceID FROM Attendance WHERE EID='$EmployeeID' AND Date='$date'");
$num= @mysqli_num_rows($result);
if($num==0){
	
$AbsenceCount=$AbsenceCount+1;
	
	}else{$count=$count+1;}
}

if($AbsenceCount==0){
	
	 echo "<c style='color:Green'>● 0 Absence Employees</a><br>" ;
	
	
	}else{
 echo "<a href='AbsenceTable.php?Tag=0' style='color:#C30'>● $AbsenceCount Absence Employees</a><br>" ;
}

echo "<a href='AbsenceTable.php?Tag=1' style='color:#360'>● $count Attendant Employees</a><br>" ;
 




mysqli_close($Conn);
?>
...................................................<br>
<a href="ChangeAdminPass.php" style="font-size:13px; font-weight:bold">Change UR Password</a>
<br><a href="AdminLogout.php">LogOut</a>
</div>
 
   
	</div>
    
    </div>
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

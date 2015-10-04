<?php session_start();

if(!isset($_SESSION["user1"])) 
{if(!isset($_SESSION['user2']))

{
	
	{header("location:Index.php");}
	
	
	


}
}



 ?>
 
 <?php 
 $FullName=$_GET['FullName'];
 
 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<?php echo"<title>".$FullName." Inbox</title>"; ?>
<link rel="stylesheet" type="text/css" href="css/Inbox.css" />
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
      <?php echo"<c style='color:orange;'>".$FullName."'s </c><c>Inbox</c>"; ?>

<?php
include ('Connection.php');

$result = @mysqli_query($Conn,"SELECT * FROM Mail WHERE Resever='".$FullName."' ORDER BY Status DESC");
$Num =@mysqli_num_rows($result);
if ($Num>0){
echo "<center><br><table  border='2' \>
<tr>
<th>Sender</th>
<th>Subject</th>
<th>Date & Time</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
	
	$S=$row['Status'];
if($S=='U'){  echo "<tr>";
  echo "<td><c style='color:orange'>●</c> " . $row['Sender'] . "</td>";
  echo "<td><form action='' method='post'>

  <input type='hidden' id='MID' name='MID' value=" . $row['MID'] . " /> 
  
  <input type='Submit' name='Subject' id='subject' value='" . $row['Subject'] . "' /></form> </td>";
 
  echo "<td>" . $row['Date'] . "</td>";
  
  
   
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='MID' name='MID' value=" . $row['MID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";}
  
  
  /*Readed Messages*/
  
  
  else{  echo "<tr>";
  echo "<td>" . $row['Sender'] . "</td>";
  echo "<td><form action='' method='post'>

  <input type='hidden' id='MID' name='MID' value=" . $row['MID'] . " /> 
  
  <input type='Submit' name='Subject' id='subject' value='" . $row['Subject'] . "' /></form> </td>";
 
  echo "<td>" . $row['Date'] . "</td>";
  
  
   
  
  
  echo "<td><form action='' method='post'><input type='hidden' id='MID' name='MID' value=" . $row['MID'] . " /> <input type='submit' name='formDelete' id='formDelete' value='Delete' /></form> </td>";
  echo "</tr>";}
}

echo "</table><br>";
//Action Form



echo"<form name='action' action='' method='post'>
<input type='submit' name='DeleteReaded' id='formDelete' value='Delete All readed' />
<input type='submit' name='Empty' id='Empty' value='Empty Inbox' /> 
<input type='submit' name='MarkRead' id='MarkRead' value='Mark All As Read' />
<input type='submit' name='MarkUnread' id='MarkUnread' value='Mark All As Unread' /></form>


";
 

}
else{echo"<p style='color:red'>You Have No Messages !<p><br><br>";}
mysqli_close($Conn);
?>



   
		
 </div>

  <div>
  
  <?php
  //Mark As Read
if(isset($_POST['Subject'])){
if(isset($_POST['MID'])){
	$MID=$_POST['MID'];
   
  include ('Connection.php');
  @mysqli_query($Conn,"UPDATE Mail SET Status='R' WHERE MID='".$MID."'");
$result = @mysqli_query($Conn,"SELECT * FROM Mail WHERE MID='".$MID."' ");
  while($row = mysqli_fetch_array($result)) {
  
    $Text = $row['Text'];
    $Sender=$row['Sender'];
	$Subject=$row['Subject'];
	$DateAndTime=$row['Date'];
  }
 echo"---------------------------------------------------------------------------------------------<p style='color:gray;font-size:18px;'>Message Header<p>";
 
 echo"<t><c>Sender : </c>".$Sender.".<br><c>Title : </c>".$Subject.".<br><c>Date & Time : </c>".$DateAndTime.".<br><p style='color:gray;font-size:18px;'>Message Text<p>".$Text."</t><br><br><br><br>";


}

 
 }

 
?>
 <?php echo"<a style='color:#666; font: bold 20px Helvetica, Arial, sans-serif;' href='javascript:window.close();'>.........<br>close</a><br>";?>
 
  </div>  
	</section><!-- content -->
</div><!-- container -->


 
 <?php
 
 
  /* Delete php code*/
 
 if(isset($_POST['formDelete'])){
if(isset($_POST['MID'])){
   
  include ('Connection.php');
    $MID = $_POST['MID'];
    
 

$result = @mysqli_query($Conn,"DELETE FROM Mail WHERE MID =".$MID);
 mysqli_close($Conn);
 header("location: Inbox.php?FullName=".$FullName."");
}

 
 }

 /*end delete code*/
?>

<?php
 
 
  /* Delete All code*/
 
 if(isset($_POST['Empty'])){

  include ('Connection.php');
 
    
 

$result = @mysqli_query($Conn,"DELETE FROM Mail WHERE Resever='$FullName'");
 mysqli_close($Conn);
header("location: Inbox.php?FullName=".$FullName."");
 
}

 
 

 /*end delete All code*/
?>
<?php
 
 
  /* Delete read*/
 
 if(isset($_POST['DeleteReaded'])){

  include ('Connection.php');
 
    
 

$result = @mysqli_query($Conn,"DELETE FROM Mail WHERE Resever='$FullName' AND Status='R'");
 mysqli_close($Conn);
 
  header("location: Inbox.php?FullName=".$FullName."");
}

 
 

 /*end delete read code*/
?>

<?php
 
 
  /* Mark All Read code*/
 
 if(isset($_POST['MarkRead'])){

  include ('Connection.php');
 
    
 

$result = @mysqli_query($Conn,"UPDATE Mail SET Status='R' WHERE Resever='$FullName'");
 mysqli_close($Conn);
header("location: Inbox.php?FullName=".$FullName."");
 
}

 
 

 /*end Mark All Read code*/
?>
<?php
 
 
  /* Mark All UnRead code*/
 
 if(isset($_POST['MarkUnread'])){

  include ('Connection.php');
 
    
 

$result = @mysqli_query($Conn,"UPDATE Mail SET Status='U' WHERE Resever='$FullName'");
 mysqli_close($Conn);
header("location: Inbox.php?FullName=".$FullName."");
 
}

 
 

 /*end Mark All UnRead code*/
?>
</body>
</html>

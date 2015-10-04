<?php
 
 
  /* Delete php code*/
 


   
  include ('Connection.php');
    
 

@mysqli_query($Conn,"TRUNCATE GoodsRequests");
 mysqli_close($Conn);
 header("location: AdminRequestList.php");


 


 /*end delete code*/
?>

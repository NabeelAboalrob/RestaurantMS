<?php session_start();?>


<?php
unset($_SESSION["user1"]);
session_destroy();
header("location:Index.php");

 ?>
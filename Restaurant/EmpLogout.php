<?php session_start();?>


<?php
unset($_SESSION["user2"]);
session_destroy();
header("location:Index.php");

 ?>
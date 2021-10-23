<?php

session_start();

if (isset($_SESSION['uname'])) {
session_destroy();
header("location:Tutorlogin.php");
}

else{
header("location:Tutorlogin.php");
}

 ?>
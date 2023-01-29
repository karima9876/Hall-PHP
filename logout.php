<?php

session_start();
unset($_SESSION["student_id"]);
//unset($_SESSION["email"]);
header("Location:login.php");

?>
<?php 
session_start();
include('db/config.php');
session_unset();
session_destroy();
echo "<script> window.location.href = '".dirname($link)."';</script>";

 ?>
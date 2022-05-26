<?php

$conn= mysqli_connect("localhost", "root","","lpgvitarachayan");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  exit(0);
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";

    $link .= "://";
    $link .= $_SERVER['HTTP_HOST'];
    $link .= $_SERVER['REQUEST_URI'];


    $base_path= $_SERVER['HTTP_HOST'];
    
?>

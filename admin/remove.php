<?php 
include('db/config.php');



 $sql= "delete from ".$_POST['table']." where id=". $_POST['id'];

 if ($run = mysqli_query($conn,$sql)) {
 	echo "Record deleted !";
 }else{
 	echo " Opps Somthing is worng!";
 }
?>
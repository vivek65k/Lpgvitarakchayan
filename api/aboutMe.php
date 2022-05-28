<?php 

	include('../admin/db/config.php');


	$sl= "update  user set about='".$_POST['data']."' where id= ".$_POST['id'];

	$run= mysqli_query($conn,$sl);
	if($run){
		echo 1;
	}else{
		echo 0;
	}
 ?>
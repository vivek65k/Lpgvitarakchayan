<?php 

	include('../admin/db/config.php');


	$sl= "insert into  applications(name,parentname,userid,dob,gender,email,mobileno,address1,payment_status) values(
	  '".$_POST['name']."',
	  '".$_POST['fname']."',
	   '".$_POST['id']."',
	    '".$_POST['date']."',
	     '".$_POST['gender']."',
	      '".$_POST['email']."',
	      '".$_POST['mobile']."',
	      '".$_POST['address']."',
	         'Pending'


       )";

	$run= mysqli_query($conn,$sl);
	if($run){
		echo 1;
	}else{
		echo 0;
	}
 ?>
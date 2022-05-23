<?php include('includes/header.php');  ?>
    <div class="container-scroller">
     
<?php include('includes/nav.php');  ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       <?php include('includes/sidebar.php');  ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account"></i>
                </span> Booking History
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
          <div class="card p-3">
          	<div class="action_button">
          		
<!-- add form -->
<!-- The Modal -->





          	</div><hr>
          	 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Customer Phone No</th>
                <th>Package Name</th>
                <th>Email Id</th>
                <th>No of Persons</th>
                <th>Booking Date</th>
                <th>Location</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
            $status ="";
              $sql= mysqli_query($conn, "select bk.id,bk.name,bk.email,bk.phoneno,bk.whatsappno,bk.passengersno,bk.bookingdt,bk.location,bk.status,bk.created_on,pk.pkgnm,bk.pkgid,bk.filedetails  from bookingpkg bk, packagelist pk where pk.id = bk.pkgid ");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['name']); ?></td>
                <td><?php echo ucfirst($row['phoneno']); ?></td>
                 <td><?php echo ucfirst($row['pkgnm']); ?></td>
                 <td><?php echo ucfirst($row['email']); ?></td>
                   <td><?php echo ucfirst($row['passengersno']); ?></td>
                  <td><?php echo ucfirst($row['bookingdt']); ?></td>
                  <td><?php echo ucfirst($row['location']); ?></td>
                <td><?php
                  if ($row['status'] == 1 )
                    {echo "Active";} 
                  else {echo "Inactive";}?></td>
                <td><?php echo date('F jS, Y h:i:s', strtotime($row['created_on'])) ; ?></td>
                <td><div class="btn-group " role="group" aria-label="Basic example">
						  <button type="button"  type="button" data-toggle="modal" data-target="#addNew<?php echo $row['id']; ?>" class="btn btn-success"><span class="iconify" data-icon="akar-icons:chat-edit"></span></button>
						  <button type="button" onclick="remove(<?php echo $row['id']; ?>)" class="btn btn-danger"><span  class="iconify" data-icon="dashicons:table-col-delete"></span></button>
						  
						</div>
						</td>
              
            </tr>

            <!-- add form -->
<!-- The Modal -->
<div class="modal" id="addNew<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="iconify" data-icon="akar-icons:chat-edit"></span> Update <?php echo $row['pkgnm']; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
         <form action="bookingdtl.php" method="post"  enctype="multipart/form-data">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Customer Name</label>
         		<input type="text" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Customer Phone No</label>
         		<input type="text" name="phoneno"  required="required" value="<?php echo $row['phoneno']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Package Name</label>
         		<input type="text" name="pkgnm"  required="required" value="<?php echo $row['pkgnm']; ?>" class="form-control">
         	</div>
         	<div class="form-group">
         		<label for="">Email Id</label>
         		<input type="text" name="email"  required="required" value="<?php echo $row['email']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">No of Persons</label>
         		<input type="number" name="passengersno"  required="required" value="<?php echo $row['passengersno']; ?>" class="form-control" >
         	</div>
         		<div class="form-group">
         		<label for="">Booking Date</label>
         		<input type="date" name="bookingdt"  required="required" value="<?php echo $row['bookingdt']; ?>" class="form-control" >
         	</div>
         	 
         		<div class="form-group">
         		<label for="">Location</label>
         		<input type="text" name="location"  required="required" value="<?php echo $row['location']; ?>" class="form-control" >
         	</div>
         	 <div class="form-group">
         		<label for="">Status</label>
            <input type="radio" name="status" value="1" <?php if($row['status']==  1) { echo "checked"; } ?> /> Active <input type="radio" name="status" value="0" <?php if($row['status']==  0) { echo "checked"; } ?> /> Inactive

         	
         	</div>
          <div>
          <label for=""> <b style="color:green">Upload Ticket:</b></label>
        <input type="file"  name="filedetails" required="required"  class="form-control">
        <a href="<?php echo dirname($link); ?>/docupload/<?php echo $row['filedetails']; ?>" download>Download File</a>
        
      </div>
      


         	<div class="form-group">
         		<input type="submit" name="update" class="btn btn-primary" value="Update">
         	</div>
         </form>
     
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>

</div>


           <?php  } ?>
        </tbody>
        <tfoot>
            <tr>
              <th>Customer Name</th>
                <th>Customer Phone No</th>
                <th>Package Name</th>
                <th>Email Id</th>
                <th>No of Persons</th>
                <th>Booking Date</th>
                <th>Location</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

          </div>


             

        </div>
    </div>
</div>


<script>
	
	function remove(id) {
		let text = " Are you sure ? you want remove this record? \n\n Press a button! Either OK or Cancel.";
   if (confirm(text) == true) {
     text = "You pressed OK!";
	  } else {
	    text = "You canceled!";
	  }
            $.ajax({
		        url: "remove.php",
		        data: { id: id, table: 'bookingpkg' },
		      
		        type: 'POST',
		        success: function (response) {
		            alert(response);
		            if (location.href.indexOf('?delete')==-1)
						{
						   location.href=location.href+'?delete';
						}
		        }
		    });
}

</script>

<!-- content-wrapper ends -->
<?php include('includes/footer.php'); 




if (isset($_POST['update'])) {
	
	$name= $_POST['name'];
  $status = $_POST['status'];
	$phoneno= $_POST['phoneno'];

	$email= $_POST['email'];
	$passengersno= $_POST['passengersno'];
	$bookingdt= $_POST['bookingdt'];
	$location= $_POST['location'];
	$status= $_POST['status'];
	$id= $_POST['id'];
  $filedetails = $_FILES['filedetails']['name'];
  $tmp_filedetails = $_FILES['filedetails']['tmp_name'];
  if ($_POST['status'] == 1 && empty($filedetails))
  {

   echo "<script> alert('Attach file First!')</script>";
        exit(0);
  }

echo $extension = pathinfo($_FILES['filedetails']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["filedetails"]["name"]);

if($extension =="pdf" || $extension =="txt" || $extension =="docx"|| $extension =="doc" || $extension =="jpg" || $extension =="png" || $extension =="jpeg"){

}else{
  echo "<script> alert('documt  should only  pdf, txt and docx!')</script>";
        exit(0);
}

echo  $size=filesize($_FILES['filedetails']['tmp_name']);
        if ($size >10485760)
        {
  
          echo "<script> alert('documt should not be more then 5 Mb !')</script>";
        exit(0);
         
        }

 $filename= $temp[0]."".date("YmdHis").".".$extension;

  if( !move_uploaded_file($tmp_filedetails,"docupload/".$filename)){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }

	
	$sql= "update bookingpkg set name='$name' , phoneno='$phoneno' , email = '$email' , passengersno= '$passengersno', bookingdt= '$bookingdt',location='$location',status='$status',filedetails='$filedetails'  where id=$id ";
  if ($run= mysqli_query($conn, $sql)) {
		 echo "<script> 
		 alert('Lista Updated !');

		   if (location.href.indexOf('#')==-1)
			{
			   location.href=location.href+'?#';
			}


		 </script>";
	}else{
		 echo "<script> alert('Opps Somthing is worng !')</script>";
	}
}
 ?>
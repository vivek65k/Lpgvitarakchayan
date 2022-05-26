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
                </span> Applications
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
                <th>Fathers Name</th>
         
                <th>Mobile No</th>
                <th>Address Line 1</th>
      
                   <th>District</th>
       
                 <th>Franchise Type</th>
                  <th>Location Type</th>
                <th>Attachment</th>
                <th>Created Date</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
            $status ="";
              $sql= mysqli_query($conn, "select *  from applications  ");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['name']); ?></td>
                <td><?php echo ucfirst($row['parentname']); ?></td>
     
                   <td><?php echo ucfirst($row['mobileno']); ?></td>
                  <td><?php echo ucfirst($row['address1']); ?></td>
 
               
                    <td><?php echo ucfirst($row['district ']); ?></td>
           
                          <td><?php echo ucfirst($row['franchaisetyp']); ?></td>
                                <td><?php echo ucfirst($row['locationtyp']); ?></td>
                    <td><?php echo ucfirst($row['attachment']); ?></td>
              
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
        <h4 class="modal-title"><span class="iconify" data-icon="akar-icons:chat-edit"></span> Update <?php echo $row['name']; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
         <form action="registration.php" method="post"  enctype="multipart/form-data">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Customer Name</label>
         		<input type="text" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control" >
         	</div>
              <div class="form-group">
            <label for="">Father's Name</label>
            <input type="text" name="parentname" required="required" value="<?php echo $row['parentname']; ?>" class="form-control" >
          </div>
          
                     <div class="form-group">
            <label for="">Type</label>
            <select class="form-control" id="gender" required="required" name="gender" required>
              <option value="">----Select  category----</option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
                 <option value="Others">Others</option>
                  </select>
         
          </div>

              <div class="form-group">
            <label for="">Email Id</label>
            <input type="text" name="email"  required="required" value="<?php echo $row['email']; ?>" class="form-control" >
          </div>
         	<div class="form-group">
         		<label for="">Customer Phone No</label>
         		<input type="text" name="mobileno"  required="required" value="<?php echo $row['mobileno']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Address Line 1</label>
         		<input type="text" name="address1"  required="required" value="<?php echo $row['address1']; ?>" class="form-control">
         	</div>
          <div class="form-group">
            <label for="">Address Line 2</label>
            <input type="text" name="address2"  required="required" value="<?php echo $row['address2']; ?>" class="form-control">
          </div>
         	<div class="form-group">
         		<label for="">State</label>
         		<input type="text" name="state"   value="<?php echo $row['state']; ?>" class="form-control" >
         	</div>
                  <div class="form-group">
            <label for="">District</label>
            <input type="text" name="district"   value="<?php echo $row['district']; ?>" class="form-control" >
          </div>
         		<div class="form-group">
         		<label for="">Pin Code</label>
         		<input type="number" name="pincode"  required="required" value="<?php echo $row['pincode']; ?>" class="form-control" >
         	</div>
         
          <div class="form-group">
            <label for="">Franchise Type</label>
            <input type="text" name="franchaisetyp"   value="<?php echo $row['franchaisetyp']; ?>" class="form-control" >
          </div>
            <div class="form-group">
            <label for="">Location Type</label>
            <input type="text" name="locationtyp"   value="<?php echo $row['locationtyp']; ?>" class="form-control" >
          </div>
          <div>
          <label for=""> <b style="color:green">Upload Ticket:</b></label>
        <input type="file"  name="attachment"   class="form-control">
        <a href="<?php echo dirname($link); ?>/docupload/<?php echo $row['attachment']; ?>" download>Download File</a>
        
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
                <th>Fathers Name</th>
         
                <th>Mobile No</th>
                <th>Address Line 1</th>
      
                   <th>District</th>
       
                 <th>Franchise Type</th>
                  <th>Location Type</th>
                <th>Attachment</th>
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
		        data: { id: id, table: 'applications' },
		      
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
  $parentname = $_POST['parentname'];
	$gender= $_POST['gender'];

	$email= $_POST['email'];
	$mobileno= $_POST['mobileno'];
	$address1= $_POST['address1'];
	$address2= $_POST['address2'];
	$state= $_POST['state'];
    $district= $_POST['district'];
  $pincode= $_POST['pincode'];
  $franchaisetyp= $_POST['franchaisetyp'];
  $locationtyp= $_POST['locationtyp'];
 
	$id= $_POST['id'];
  $attachment = $_FILES['attachment']['name'];
  $tmp_attachment = $_FILES['attachment']['tmp_name'];
 

echo $extension = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["attachment"]["name"]);

if($extension =="pdf" || $extension =="txt" || $extension =="docx"|| $extension =="doc" || $extension =="jpg" || $extension =="png" || $extension =="jpeg"){

}else{
  echo "<script> alert('documt  should only  pdf, txt and docx!')</script>";
        exit(0);
}

echo  $size=filesize($_FILES['attachment']['tmp_name']);
        if ($size >10485760)
        {
  
          echo "<script> alert('documt should not be more then 5 Mb !')</script>";
        exit(0);
         
        }

 $filename= $temp[0]."".date("YmdHis").".".$extension;

  if( !move_uploaded_file($tmp_attachment,"docupload/".$filename)){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }

	
	$sql= "update applications set name='$name' , parentname='$parentname' , gender='$gender' , franchaisetyp='$franchaisetyp' , district='$district' , locationtyp='$locationtyp' , email = '$email' , mobileno= '$mobileno', address1= '$address1',address2='$address2',state='$state',attachment='$attachment' ,pincode='$pincode' where id=$id ";
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
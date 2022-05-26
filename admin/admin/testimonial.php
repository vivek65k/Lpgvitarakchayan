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
                </span>Testimonial
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
               <button type="button" data-toggle="modal" data-target="#addNew" class="btn btn-gradient-primary me-2"><span class="iconify" data-icon="akar-icons:folder-add"></span> Add new</button>
          		
<!-- add form -->
<!-- The Modal -->

<!-- add form -->
<!-- The Modal -->
<div class="modal" id="addNew" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="iconify" data-icon="akar-icons:folder-add"></span> Add new</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form action="testimonial.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name"  required="required" class="form-control" >
          </div>
              <div class="form-group">
            <label for="">Details</label>
            <input type="text" name="details"  required="required" class="form-control" >
          </div>
          
       <div class="form-group">
        <label for=""> Image Upload:</label>
        <input type="file"  name="addimagedata" required="required"  class="form-control">
      </div>
          
    
  

          <div class="form-group">
            <input type="submit" name="addNew" class="btn btn-primary" value="Submit">
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





          	</div><hr>
          	 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Details </th>               
                <th>Image</th>               
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
            $status ="";
              $sql= mysqli_query($conn, "select * from testimonial");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['name']); ?></td>
                <td><?php echo ucfirst($row['details']); ?></td>
                 <td><?php echo ucfirst($row['image']); ?></td>
                
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
      
         <form action="testimonial.php" method="post"  enctype="multipart/form-data">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Customer Name</label>
         		<input type="text" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Details</label>
         		<input type="text" name="details"  required="required" value="<?php echo $row['details']; ?>" class="form-control" >
         	</div>
         
          <div>
          <label for=""> <b style="color:green">Upload Ticket:</b></label>
        <input type="file"  name="filedetails" required="required"  class="form-control">
     <!--    <a href="<?php echo dirname($link); ?>/docupload/<?php echo $row['filedetails']; ?>" download>Download File</a> -->
        
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
		        data: { id: id, table: 'testimonial' },
		      
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



if (isset($_POST['addNew'])) {
  
 
  $name= $_POST['name'];
  $details= $_POST['details'];
 
    $addimagedata = $_FILES['addimagedata']['name'];
   $tmp_addimagedata = $_FILES['addimagedata']['tmp_name'];

echo $extension = pathinfo($_FILES['addimagedata']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["addimagedata"]["name"]);

if($extension =="jpg" || $extension =="jpeg" || $extension =="png"){

}else{
  echo "<script> alert('Image should only  jpg, jpeg and png!')</script>";
        exit(0);
}

echo  $size=filesize($_FILES['addimagedata']['tmp_name']);
        if ($size >10485760)
        {
  
          echo "<script> alert('Image should not be more then 5 Mb !')</script>";
        exit(0);
         
        }

 $filename= $temp[0]."".date("YmdHis").".".$extension;

  if( !move_uploaded_file($tmp_addimagedata,"testimonial/".$filename)){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }

 

  $sql= "insert into testimonial(name,details, image)VALUES('$name','$details','$filename')";
  // echo $sql;

  if ($run= mysqli_query($conn, $sql)) {
     echo "<script> 
     alert('New testimonial created !');

       if (location.href.indexOf('#')==-1)
      {
         location.href=location.href+'?#';
      }


     </script>";
  }else{
     echo "<script> alert('Opps Somthing is worng !')</script>";
  }
}

if (isset($_POST['update'])) {
	
	$name= $_POST['name'];
  $details = $_POST['details'];
	
	$id= $_POST['id'];
  $filedetails = $_FILES['filedetails']['name'];
  $tmp_filedetails = $_FILES['filedetails']['tmp_name'];


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

  if( !move_uploaded_file($tmp_filedetails,"testimonial/".$filename)){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }

	
	$sql= "update testimonial set name='$name',details='$details' ,image='$filename'  where id=$id ";
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
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
                </span> User History
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
                <th>Customer Email</th>
                <th>User Name</th>
       
                <th>Created Date</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
              $sql= mysqli_query($conn, "select * from user");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['name']); ?></td>
                <td><?php echo ucfirst($row['email']); ?></td>
                 <td><?php echo ucfirst($row['username']); ?></td>
  
                <td><?php echo date('F jS, Y h:i:s', strtotime($row['created_on'])) ; ?></td>
                <td><div class="btn-group " role="group" aria-label="Basic example">
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
      
         <form action="userlst.php" method="post"  enctype="multipart/form-data">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Customer Name</label>
         		<input type="text" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Email</label>
         		<input type="text" name="email"  required="required" value="<?php echo $row['email']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">User Name</label>
         		<input type="text" name="username"  required="required" value="<?php echo $row['username']; ?>" class="form-control">
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
                <th>Customer Email</th>
                <th>User Name</th>
                  <th>Password</th>
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
		        data: { id: id, table: 'user' },
		      
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

	$email= $_POST['email'];
	$username= $_POST['username'];


	
	$id= $_POST['id'];
	
	$sql= "update bookingpkg set name='$name' , email='$email' , username = '$username'   where id=$id ";
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
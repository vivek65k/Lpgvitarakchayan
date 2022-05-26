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
                </span> Admin (Users)
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
<div class="modal" id="addNew">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="iconify" data-icon="akar-icons:folder-add"></span> Add new</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form action="admin.php" method="post">
         	<div class="form-group">
         		<label for="">Name</label>
         		<input type="text" name="name"  required="required" class="form-control" >
         	</div>

         	<div class="form-group">
         		<label for="">Username</label>
         		<input type="text" name="username"  required="required" class="form-control" >
         	</div>

         	<div class="form-group">
         		<label for="">Password</label>
         		<input type="password"  required="required" name="password" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Role</label>
         		<select class="form-control"  required="required" name="role">
					  <option value="admin">Admin</option>
					  <option value="manager">Manager</option>
					  <option value="user">User</option>		
				</select>
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
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Created Date</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
              $sql= mysqli_query($conn, "select * from admin");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['name']); ?></td>
                <td><?php echo ucfirst($row['username']); ?></td>
                <td><?php echo ucfirst($row['role']); ?></td>
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
      
         <form action="admin.php" method="post">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Name</label>
         		<input type="text" name="name" required="required" value="<?php echo $row['name']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Username</label>
         		<input type="text" name="username"  required="required" value="<?php echo $row['username']; ?>" class="form-control" >
         	</div>

         	<div class="form-group">
         		<label for="">Password</label>
         		<input type="password" name="password"  required="required" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Role</label>
         		<select class="form-control" name="role"  required="required" value="<?php echo $row['role']; ?>">
					  <option value="admin">Admin</option>
					  <option value="manager">Manager</option>
					  <option value="user">User</option>		
				</select>
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
               <th>Name</th>
                <th>Username</th>
                <th>Role</th>
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
		        data: { id: id, table: 'admin' },
		      
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

	$username= $_POST['username'];
	$password= md5($_POST['password']);
	$role= $_POST['role'];
	 $sql= "select * from admin where username ='".$username."'";
	 if($query=mysqli_query($conn,$sql)){

    $row = mysqli_num_rows($query);

  if($row>0){
         echo "<script> alert('Opps Admin is Exits Try Another username !')</script>";
         exit(0);
     }
	}

	$sql= "insert into admin(name,username,password,role)VALUES('$name','$username','$password','$role')";
	// echo $sql;

	if ($run= mysqli_query($conn, $sql)) {
		 echo "<script> 
		 alert('New admin created !');

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
	$username= $_POST['username'];
	$password= md5($_POST['password']);
	$role= $_POST['role'];
	$id= $_POST['id'];
	$sql= "update admin set name='$name' , username='$username' , password = '$password' , role= '$role' where id=$id ";
  if ($run= mysqli_query($conn, $sql)) {
		 echo "<script> 
		 alert('Admin Updated !');

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
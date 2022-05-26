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
                </span> Dashboard Details
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
         <form action="dashboard.php" method="post" enctype="multipart/form-data">
         	<div class="form-group">
         		<label for="">Name</label>
         		<input type="text" name="name"  required="required" class="form-control" >
         	</div>
         	  	<div class="form-group">
         		<label for="">Details</label>
         		<input type="text" name="description"   class="form-control" >
         	</div>

          <div class="form-group">
            <label for="">Link</label>
            <input type="text" name="link"   class="form-control" >
          </div>
      <div class="form-group">
        <label for=""> Attachment:</label>
        <input type="file"  name="attachment"   class="form-control">
      </div>
         	 <div class="form-group">
         		<label for="">Type</label>
            <select class="form-control" id="type" required="required" name="type" required>
              <option value="">----Select  category----</option>
                 <option value="whatsnew">Whats New</option>
                 <option value="implink">IMPORTANT LINKS</option>
                 <option value="bannerone">Banner Details One</option>
                    <option value="bannerteo">Banner Details Two</option>
                  </select>
         
         	</div>
       
  
      	   <div class="form-group">
         		<label for="">Set Position</label>
         		<input type="number" name="pos"  required="required" class="form-control" min="0">
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
                <th>Details</th>
                 <th>Link</th>
                <th>Attachment</th>
                <th>Section Name</th>
                <th>Set Position</th>
                <th>Created Date</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
              $sql= mysqli_query($conn, "select * from homescreen");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['name']); ?></td>
                <td><?php echo ucfirst($row['description']); ?></td>
                    <td><?php echo ucfirst($row['link']); ?></td>
                  <td><?php echo ucfirst($row['attachment']); ?></td>
                  <td><?php echo ucfirst($row['type']); ?></td>
                <td><?php echo ucfirst($row['pos']); ?></td>
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
      
         <form action="dashboard.php" method="post"  enctype="multipart/form-data">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Name</label>
         		<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Details</label>
         		<input type="text" name="description"  value="<?php echo $row['description']; ?>" class="form-control" >
         	</div>
            <div class="form-group">
            <label for="">Link</label>
            <input type="text" name="link" value="<?php echo $row['link']; ?>" class="form-control" >
          </div>
              <div class="form-group">
        <label for=""> Attachment</label>
        <input type="file"  name="attachment"  class="form-control">
           <a href="<?php echo dirname($link); ?>/pckimages/<?php echo $row['attachment']; ?>" download>Attached File</a>
     
      </div>
                 <div class="form-group">
            <label for="">Type</label>
            <select class="form-control" id="type" name="type" required>
              <option value="">----Select  category----</option>
                 <option value="whatsnew">Whats New</option>
                 <option value="implink">IMPORTANT LINKS</option>
                 <option value="bannerone">Banner Details One</option>
                    <option value="bannerteo">Banner Details Two</option>
                  </select>
         
          </div>

         	<div class="form-group">
         		<label for="">Position</label>
         		<input type="number" name="pos"  required="required" value="<?php echo $row['pos']; ?>" class="form-control" min="0">
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
                <th>Details</th>
                      <th>link</th>
                <th>Attachment</th>
                <th>Section Name</th>
                <th>Set Position</th>
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
		        data: { id: id, table: 'homescreen' },
		      
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
  $description= $_POST['description'];
  $type= $_POST['type'];
    $link= $_POST['link'];
	$pos= $_POST['pos'];

	  $attachment = $_FILES['attachment']['name'];
   $tmp_attachment = $_FILES['attachment']['tmp_name'];
if (!empty($attachment))
{
echo $extension = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["attachment"]["name"]);

if($extension =="pdf" || $extension =="txt" || $extension =="docx"|| $extension =="doc" || $extension =="jpg" || $extension =="png" || $extension =="jpeg"){

}else{
  echo "<script> alert('Image should only  jpg, jpeg and png!')</script>";
        exit(0);
}

echo  $size=filesize($_FILES['attachment']['tmp_name']);
        if ($size >10485760)
        {
  
          echo "<script> alert('Image should not be more then 5 Mb !')</script>";
        exit(0);
         
        }

 $filename= $temp[0]."".date("YmdHis").".".$extension;

  if( !move_uploaded_file($tmp_attachment,"pckimages/".$filename)){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }
}
	 $sql= "select * from homescreen where name ='".$name."' and   description = '".$description."'  and type  = '".$type."' ";
	 if($query=mysqli_query($conn,$sql)){

    $row = mysqli_num_rows($query);

  if($row>0){
         echo "<script> alert('Opps same name and type is Exits Try Another Name !')</script>";
         exit(0);
     }
	}
else{
  $filename = '';
}
	$sql= "insert into homescreen(name,description,type,link,attachment,pos)VALUES('$name','$description','$type','$link','$filename','$pos')";
	// echo $sql;

	if ($run= mysqli_query($conn, $sql)) {
		 echo "<script> 
		 alert('New package created !');

		   if (location.href.indexOf('#')==-1)
			{
			   location.href=location.href+'?#';
			}


		 </script>";
	}else{
		 echo "<script> alert('Opps Somthing is worng1 !')</script>";
	}
}




if (isset($_POST['update'])) {
	
	$name= $_POST['name'];

	$description= $_POST['description'];
	$type= $_POST['type'];
    $link= $_POST['link'];
	$pos= $_POST['pos'];
	$id= $_POST['id'];
	$attachment=$_FILES['attachment']['name'];
	$tmp_attachment=$_FILES['attachment']['tmp_name'];
if (!empty($attachment))
{
$extension = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["attachment"]["name"]);
if($extension =="pdf" || $extension =="txt" || $extension =="docx"|| $extension =="doc" || $extension =="jpg" || $extension =="png" || $extension =="jpeg"){

}else{
  echo "<script> alert('Image should only  jpg, jpeg and png!')</script>";
        exit(0);
}

 echo $size=filesize($_FILES['attachment']['tmp_name']);
        if ($size > 10485760)
        {
  
          echo "<script> alert('Image should not be more then 5 Mb !')</script>";
        exit(0);
         
        }

 $filename= $temp[0]."".date("YmdHis").".".$extension;
	if( !move_uploaded_file($tmp_attachment,"pckimages/$filename")){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }
}
else{
  $filename = '';
}
if( !empty($link) && !empty($attachment))
{
     echo "<script> alert('Both attachment And link not allowed !')</script>";
        exit(0);
}
	$sql= "update homescreen set name='$name' , description='$description' , type = '$type' ,link='$link', pos= '$pos',attachment='$filename' where id=$id ";
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


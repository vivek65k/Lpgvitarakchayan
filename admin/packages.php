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
                </span> Package Lists
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
         <form action="packages.php" method="post" enctype="multipart/form-data">
         	<div class="form-group">
         		<label for="">Package Name</label>
         		<input type="text" name="pkgnm"  required="required" class="form-control" >
         	</div>
         	  	<div class="form-group">
         		<label for="">Package Details</label>
         		<input type="text" name="pkgdtls"  required="required" class="form-control" >
         	</div>
         	 <div class="form-group">
         		<label for="">Package Amount</label>
         		<input type="number" name="pkgamt"  required="required" class="form-control" min="0">
         	</div>
             <div class="form-group">
         		<label for="">Tooltip Details</label>
         		<input type="text" name="ttd"  required="required" class="form-control">
         	</div>
         	   <div class="form-group">
		    <label for=""> Image Upload:</label>
		    <input type="file"  name="addimagedata" required="required"  class="form-control">
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
                <th>Package Name</th>
                <th>Package Details</th>
                <th>Package Amount</th>
                <th>Tooltip Details</th>
                <th>Set Position</th>
                <th>Created Date</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        	<?php 
              $sql= mysqli_query($conn, "select * from packagelist");
              while ($row= mysqli_fetch_array($sql)) {
              	?>
             
            <tr>
                <td><?php echo ucfirst($row['pkgnm']); ?></td>
                <td><?php echo ucfirst($row['pkgdtls']); ?></td>
                  <td><?php echo ucfirst($row['pkgamt']); ?></td>
                  <td><?php echo ucfirst($row['ttd']); ?></td>
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
        <h4 class="modal-title"><span class="iconify" data-icon="akar-icons:chat-edit"></span> Update <?php echo $row['pkgnm']; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
         <form action="packages.php" method="post"  enctype="multipart/form-data">
           <!-- in update form id be must included -->
         	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         	<div class="form-group">
         		<label for="">Package Name</label>
         		<input type="text" name="pkgnm" required="required" value="<?php echo $row['pkgnm']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Package Details</label>
         		<input type="text" name="pkgdtls"  required="required" value="<?php echo $row['pkgdtls']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Package Amount</label>
         		<input type="number" name="pkgamt"  required="required" value="<?php echo $row['pkgamt']; ?>" class="form-control" min="0">
         	</div>
         	<div class="form-group">
         		<label for="">Tooltip Details</label>
         		<input type="text" name="ttd"  required="required" value="<?php echo $row['ttd']; ?>" class="form-control" >
         	</div>
         	<div class="form-group">
         		<label for="">Position</label>
         		<input type="number" name="pos"  required="required" value="<?php echo $row['pos']; ?>" class="form-control" min="0">
         	</div>
           <div class="form-group">
		    <label for=""> Image Upload:</label>
		    <input type="file"  name="imagedata" required="required"  class="form-control">
        <img src="<?php echo dirname($link); ?>/pckimages/<?php echo $row['imagedata']; ?>" alt="<?php echo  $row['imagedata'];?>" height="100" width="120" title="products Image">
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
                <th>Package Name</th>
                <th>Package Details</th>
                <th>Package Amount</th>
                <th>Tooltip Details</th>
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
		        data: { id: id, table: 'packagelist' },
		      
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
	
	$pkgnm= $_POST['pkgnm'];

	$pkgdtls= $_POST['pkgdtls'];
	$pkgamt= $_POST['pkgamt'];
	$ttd= $_POST['ttd'];
	$pos= $_POST['pos'];
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

  if( !move_uploaded_file($tmp_addimagedata,"pckimages/".$filename)){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }

	 $sql= "select * from packagelist where pkgnm ='".$pkgnm."' and pkgdtls = '".$pkgdtls."'  and pkgamt = '".$pkgamt."' ";
	 if($query=mysqli_query($conn,$sql)){

    $row = mysqli_num_rows($query);

  if($row>0){
         echo "<script> alert('Opps Package name is Exits Try Another Name !')</script>";
         exit(0);
     }
	}

	$sql= "insert into packagelist(pkgnm,pkgdtls,pkgamt,ttd,pos,imagedata)VALUES('$pkgnm','$pkgdtls','$pkgamt','$ttd','$pos','$filename')";
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
		 echo "<script> alert('Opps Somthing is worng !')</script>";
	}
}




if (isset($_POST['update'])) {
	
	$pkgnm= $_POST['pkgnm'];

	$pkgdtls= $_POST['pkgdtls'];
	$pkgamt= $_POST['pkgamt'];
	$ttd= $_POST['ttd'];
	$pos= $_POST['pos'];
	$id= $_POST['id'];
	$imagedata=$_FILES['imagedata']['name'];
	$tmp_imagedata=$_FILES['imagedata']['tmp_name'];

$extension = pathinfo($_FILES['imagedata']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["imagedata"]["name"]);
if($extension =="jpg" || $extension =="jpeg" || $extension =="png"){

}else{
  echo "<script> alert('Image should only  jpg, jpeg and png!')</script>";
        exit(0);
}

 echo $size=filesize($_FILES['imagedata']['tmp_name']);
        if ($size > 10485760)
        {
  
          echo "<script> alert('Image should not be more then 5 Mb !')</script>";
        exit(0);
         
        }

 $filename= $temp[0]."".date("YmdHis").".".$extension;
	if( !move_uploaded_file($tmp_imagedata,"pckimages/$filename")){
        echo "<script> alert('Please Upload File !')</script>";
        exit(0);
  }

	$sql= "update packagelist set pkgnm='$pkgnm' , pkgdtls='$pkgdtls' , pkgamt = '$pkgamt' , ttd= '$ttd', pos= '$pos',imagedata='$filename' where id=$id ";
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
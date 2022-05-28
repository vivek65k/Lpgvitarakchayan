<?php 
session_start();
 include('../admin/db/config.php');
  $sql= "select * from user where id=".$_SESSION['id'];
 $rn= mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($rn);

    $asql= "select * from  applications where userid=".$_SESSION['id'];
     $arn= mysqli_query($conn,$asql);
       $arow= mysqli_fetch_array($arn);
       $arowCount= mysqli_num_rows($arn);
       


 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LPG Vitarak Chayan - <?php echo $_SESSION['name'];  ?></title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Application</a></li>
                   
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        LPG  
                        <span class="text-primary">Vitarak</span>
                        Chayan
                    </h1>
                    <div class="subheading mb-5">
                       Hello  
                        <a href="#"> <?php echo $_SESSION['name'];  ?>  <span>  <button class="btn btn-success btn-sm" id="btnAbout"> <i class="fa fa-pencil-square-o"></i> edit </button></span></SP></a>
                    </div>
                    <p class="lead mb-5"><?php echo $row['about']; ?></p>
                   
                  <div>
                      <form method="post" id="aboutform">
                           <input type="text" name="abouttext" id="abouttext" class="form-control" required="required" placeholder="Tell me about you">
                           <button type="submit" id="aboutSubmit" class="btn btn-primary">Save</button>
                      </form>
                  </div>
                   
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Application</h2>


                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">

                            <?php if($arow['application_startus']== 'Pending'){ ?>
                              
                            <h3 class="mb-0">Status</h3>
                            <div class="subheading mb-3" style="color: yellow ; font-weight: bolder;"><?php echo $arow['application_startus']; ?></div>
                            <p> We are reviewing your application generally this process takes 1 week, But sometimes it takes 1 to 2 weeks. As soon as it is approved, here you will get the status <b>Active</b>.</p>

                            <p><a href="../invoicemaster/invoice.php"> <i class="fa fa-download" aria-hidden="true"></i> Download Application</a></p>

                             <?php }elseif ($arow['application_startus']== 'Approved') { ?>
                                 <div class="subheading mb-3" style="color: green ; font-weight: bolder;"><?php echo $arow['application_startus']; ?></div>
                                 <div class="card"style="padding: 10px;">
                                  <?php 
                                    $psql="select * from payment where userid=".$_SESSION['id'];
                                       $prn= mysqli_query($conn,$psql);
                                       $prow= mysqli_fetch_array($prn);
                                     if($prow['status']=='NotYetPaid'){
                                   ?>
                                   <div style="background-color: #21618C ; color: white ;padding: 10px;">
                                      <center><p>Your application is <b>Approved</b> by admin !  Now you have to pay and uplode the payment recipt here for further process or final process.</p></center>
                                   </div>
                                  
                                    <?php }
                                      
                                       if($prow['status']=='NotYetPaid'){?>

                                           <p> <br>We are reviewing your payment generally this process takes 1 week, As soon as it is approved, here you will get the status <b>Active</b>.</p>


                                         <?php }elseif ($prow['status']=='Paid') {?>
                                           <p><a href="../invoicemaster/invoice.php" style="color: green ; font-weight: bold;"> <i class="fa fa-download" aria-hidden="true"></i> Download KYC Form</a></p>
                                           
                                        <?php }else{?>
                                          <div class="payment_block">
                                               <form method="post" id="payment" action="index.php" enctype="multipart/form-data">
                                                <div class="form-group">
                                                  <label for="">Ref No.</label>
                                                  <input type="text" name="ref" class="form-control" id="ref">
                                                </div>
                                                 <div class="form-group">
                                                  <label for="">Payment recipt</label>
                                                 <input type="file" name="recipt" placeholder="" class="form-control" id="recipt">
                                                </div>
                                                <div>
                                                  <input type="submit" id="submit" value="submit" class="btn btn-block btn-success" name="submit">
                                                </div>                                               
                                               
                                              </form>
                                      
                                           </div>

                                       <?php } ?>

                                    

                                </div>
                               
                            <?php }elseif($arow['application_startus']== 'Rejected'){ ?>
                                 <div class="subheading mb-3" style="color: red ; font-weight: bolder;"><?php echo $arow['application_startus']; ?></div>
                                 <div class="card">
                                   <div class="card" style=" padding: 10px;">
                                    <p>Your application is <b>Rejected</b> by admin !  Due to some reason! you can contact with you agent</p>
                                    <p><a href="../invoicemaster/invoice.php"> <i class="fa fa-download" aria-hidden="true"></i> Download Application</a></p>

                                </div>

                                </div>

                            <?php }else{ ?>


                           
                            <form method="post" id="application">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" required="required" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Father’s name</label>
                                <input type="text" name="fname" id="fname" required="required" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option disabled="disabled" selected="selected">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" required="required" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="number" name="mobile" id="mobile" required="required" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Date Of birth</label>
                                <input type="date" name="date" id="date" required="required" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" name="address" id="address"></textarea>
                            </div><br><br>
                          <div class="form-group">
                              <input type="submit" class="btn-primary btn" value="Apply" name="apply" id="apply">
                          </div>

                        </form>
                         <?php } ?>
                        </div>
                       
                    </div>

                </div>
            </section>
          
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                 $("#aboutform").hide();
                 $("#btnAbout").click(function(event){
                     event.preventDefault();
                   $("#aboutform").show();
                 });

                 $("#aboutSubmit").click(function(event){
                    event.preventDefault();
                  var abouttext= $("#abouttext").val();
                  if(abouttext==''){
                    swal("Enter about you !");
                    return false;
                  }
                  var id= "<?php echo $_SESSION['id']; ?>";
                   
                    $.ajax({
                          type: 'POST',
                          url: "../api/aboutMe.php",
                          data: {data:abouttext, id:id },
                          dataType: "text",
                          success: function(resultData) { alert(resultData) }
                    });
                 });

           //Apply
              $("#apply").click(function(event){
                    event.preventDefault();
                  var mobile= $("#mobile").val();
                  var date= $("#date").val();
                    var date1 = new Date("01-01-2010");
                    var date2 = new Date(date);
                    if(date2> date1){
                         swal("It's not your DOB (Must be at least Year 2010)");
                         return false;
                    }

                   if(mobile.length != 10){
                      swal("Invalid phone number; "+mobile.length+"(number)");
                         return false;
                   }
                    var data= $("#application").serialize();//only input
                   
                    $.ajax({
                          type: 'POST',
                          url: "../api/application.php",
                          data:data,
                          dataType: "text",
                          success: function(resultData) {
                            if(resultData==1){
                                 alert("Thanks for apply!");
                                 swal("Good job!", "Your Application send for approval", "success");
                                 window.location.replace('<?php echo dirname($link); ?>/user');
                            }else{
                                swal("Somthing is worng");

                            }

                           }
                    });
                 });



            });
        </script>
    </body>
</html>

<?php 
 if(isset($_POST['submit'])){
  $ref= $_POST['ref'];
  $attachment = $_FILES['recipt']['name'];
  $tmp_attachment = $_FILES['recipt']['tmp_name'];

 $extension = pathinfo($_FILES['recipt']['name'], PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["recipt"]["name"]);
if($extension =="pdf" || $extension =="txt" || $extension =="docx"|| $extension =="doc" || $extension =="jpg" || $extension =="png" || $extension =="jpeg"){

 $filename= $temp[0]."".date("YmdHis").".".$extension;
  if( !move_uploaded_file($tmp_attachment,"../admin/recipt/".$filename)){    
        echo "<script> swal('Please Upload valid recipt !')</script>";
        exit(0);
  }

  $sql= "insert into payment(userid,recipt,status) values('".$_SESSION['id']."','".$filename."','NotYetPaid')";
  $run=mysqli_query($conn,$sql);
  if($run){
      echo "<script> swal('Woow You made your payment! Now Please wait for review !');
      alert('ok');
    

      </script>";
  }else{
     echo "<script> swal('Opps Somthing is worng!'); </script>";
  }

}else{
  echo "<script> swal('document  should only  pdf, txt and docx!')</script>";
        exit(0);
}




 }

 ?>
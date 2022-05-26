  <!-- ======= Hero Section ======= -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
  <section id="hero" class="d-flex align-items-center">
    <div class="container-fluid position-relative" data-aos="fade-up" data-aos-delay="100">

     <div class="row">

      <div class="col-md-6 col-lg-6 col-sm-12">
         <div class="row justify-content-center" style="margin-top: 22%">
            <div class="col-xl-9 col-lg-9 text-center">
              <h1>Welcome to <br><p>LPG <span style="color: #FB8132;">Vitarak</span> Chayan</p></h1>
              <h2>You choose whichever suits you best</h2>
            </div>
          </div>
          <div class="text-center">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
      </div>
      <div class="col-md-6 col-lg-6 col-sm-12">
        <a href="index.html" class="logo"><img src="assets/img/244-2449796_.png" alt="" class="img-fluid"></a>
      </div>
       
     </div>
     <div class="intro">
            <marquee>For any query or complaint regarding the selection of LPG Distributors appearing on this website please send email to kanhaikumar961@gmail.com or contact concerned Area Office (IOC) / Territory Office (BPC) / Regional Office (HPC). Details are given in the link available below.</marquee>            
      </div>

      <div class="row icon-boxes" style="width: 85%; margin-left: 10%; margin-bottom: 3%; " >     
      

        <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0 " data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <!-- <div class="icon"><i class="fa fa-bullhorn" aria-hidden="true"></i></div> -->
            <h4 class="title"><span><i class="fa fa-bullhorn icon" aria-hidden="true"></i></span><a href="">WHATS NEW</a></h4>
           
         <div class="whatnewslisting">
 <marquee  direction = "up" loop="true" onmouseover="this.stop();" onmouseout="this.start();">
         <ul>
          <?php
         $sql= mysqli_query($conn,"select * from homescreen where type = 'whatsnew'");
                            while ($row= mysqli_fetch_array($sql)) { ?>

            <li><a href="<?php echo  $row['link']; ?>" target="_blank">
 <?php echo $row['name'];?> 
                      </a></li>
                <?php } ?>
                      </ul>
                              </marquee>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-6" ><a  id = 'myBtn'>View all</a></div>
            <div id="myModal" class="modal">
              <div class="modal-content">
    <span class="close">&times;</span>
    <ul>
          <?php
         $sql= mysqli_query($conn,"select * from homescreen where type = 'whatsnew'");
                            while ($row= mysqli_fetch_array($sql)) { ?>

            <li><a href="<?php echo  $row['link']; ?>" target="_blank">
 <?php echo $row['name'];?> 
                      </a></li>
                <?php } ?>
                      </ul>
  
  </div>
  </div>
            <div class="col-lg-6" ><a  style="float: right" href="">Applicants Selected in Draw</a></div>
          </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0 " data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">          
            <!-- <div class="icon"><i class="fa fa-link" aria-hidden="true"></i></div> -->
            <h4 class="title"> <span><i class="fa fa-link icon" aria-hidden="true"></i></span><a href="">IMPORTANT LINKS</a></h4>
           <div class="importantlisting" >
            <ul>
                     <?php
         $sql= mysqli_query($conn,"select * from homescreen where type = 'implink'");
                            while ($row= mysqli_fetch_array($sql)) { ?>
                              <li><a href="admin/pckimages/<?php echo  $row['attachment']; ?>" target="_blank">
 <?php echo $row['name'];?> 
                      </a></li>
                <?php } ?>

                      </ul>
          </div>
         
        </div>

      </div>
    </div>
  </section><!-- End Hero -->
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
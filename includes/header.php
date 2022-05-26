<?php 
session_start();
 include('admin/db/config.php');

 ?>

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.html">LPG Vitarak Chayan</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo"><img src="assets/img/logo.jpg" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
         <!--  <li><a class="nav-link scrollto active" href="#hero">Apply for Draw Contest </a></li>
          <li><a class="nav-link scrollto" href="#about">Requirements and Benefits</a></li>
          <li><a class="nav-link scrollto" href="#services">Faqs</a></li> -->

          <?php if (isset($_SESSION['name'])) { ?>
           <li><a class="getstarted scrollto" href="user/">Hii  <?php echo $_SESSION['name'];  ?> <i class="fa fa-chevron-down" aria-hidden="true"></i></a></li>
           <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
         <?php }else{ ?>

          <li><a class="getstarted scrollto" href="login/login.php">Login</a></li>
          <!-- ujjwala-yojna -->
          <!-- <li><a href="index.html" class="logo"><img src="assets/img/ujjwala-yojna.png" alt="" class="img-fluid"></a></li> -->
          <li><a class="getstarted scrollto" href="login/signup.php">Register</a></li>

        <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
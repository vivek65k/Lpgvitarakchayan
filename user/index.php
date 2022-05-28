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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
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

                            <?php if($arow['payment_status']== 'Pending'){ ?>
                              
                            <h3 class="mb-0">Status</h3>
                            <div class="subheading mb-3" style="color: green ; font-weight: bolder;"><?php echo $arow['payment_status']; ?></div>
                            <p> We are reviewing your application generally this process takes 1 week, But sometimes it takes 1 to 2 weeks. As soon as it is approved, here you will get the status <b>Active</b>.</p>

                             <?php }elseif ($arow['payment_status']== 'Active') { ?>
                                 <div class="card">
                                    <h1>Active</h1>

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
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">University of Colorado Boulder</h3>
                            <div class="subheading mb-3">Bachelor of Science</div>
                            <div>Computer Science - Web Development Track</div>
                            <p>GPA: 3.23</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">August 2006 - May 2010</span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">James Buchanan High School</h3>
                            <div class="subheading mb-3">Technology Magnet Program</div>
                            <p>GPA: 3.56</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">August 2002 - May 2006</span></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                        <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                        <li class="list-inline-item"><i class="fab fa-react"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-less"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                        <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Mobile-First, Responsive Design
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Cross Browser Testing & Debugging
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Cross Functional Teams
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Agile Development & Scrum
                        </li>
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
                    <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            Google Analytics Certified Developer
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            Mobile Web Specialist - Google Certification
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - University of Colorado Boulder - Emerging Tech Competition 2009
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            2
                            <sup>nd</sup>
                            Place - University of Colorado Boulder - Emerging Tech Competition 2008
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - James Buchanan High School - Hackathon 2006
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            3
                            <sup>rd</sup>
                            Place - James Buchanan High School - Hackathon 2005
                        </li>
                    </ul>
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

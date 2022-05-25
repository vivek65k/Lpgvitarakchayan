 <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $admin_name; ?></span>
                  <span class="text-secondary text-small">Project <?php echo ucfirst($admin_role); ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">Packages</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/forms/basic_elements.html">
                <span class="menu-title">Forms</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Charts</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <span class="menu-title">Admin</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Modify Dashboard</span>
                <i class="mdi mdi-airballoon menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="registration.php">
                <span class="menu-title">Registration Forms</span>
                <i class="mdi mdi-book-open-page-variant menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="approvalregistration.php">
                <span class="menu-title">Pending Approvals</span>
                <i class="mdi mdi-book-open-page-variant menu-icon"></i>
              </a>
            </li>
                 <li class="nav-item">
              <a class="nav-link" href="userlst.php">
                <span class="menu-title">User Details</span>
                <i class="mdi mdi-human-greeting menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="testimonial.php">
                <span class="menu-title">Testimonial</span>
                <i class="mdi mdi-human-greeting menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
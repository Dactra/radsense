<?php // Initialize the session
include 'config.php';
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} ?>
<html lang="en">

<head>
    <title>Radsense - Radius MYSQL integration for pfsense</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="index.php">Radsense</a>
                </h1>
                <span>M</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
              <li>
                  <a href="index.php">
                      <i class="fas fa-th-large"></i>
                      Dashboard
                  </a>
              </li>
              <li>
                  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                      <i class="fas fa-laptop"></i>
                      Admin
                      <i class="fas fa-angle-down fa-pull-right"></i>
                  </a>
                  <ul class="collapse list-unstyled" id="homeSubmenu">
                      <li>
                          <a href="admin.php">Change admin setttings</a>
                      </li>
                  </ul>
              </li>
              <li class="active">
                  <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">
                      <i class="fas fa-users"></i>
                      User
                      <i class="fas fa-angle-down fa-pull-right"></i>
                  </a>
                  <ul class="collapse list-unstyled" id="pageSubmenu2">
                      <li>
                          <a href="#">Search</a>
                      </li>
                      <li>
                          <a href="register.php">Register User</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">
                      <i class="far fa-map"></i>
                      Service
                      <i class="fas fa-angle-down fa-pull-right"></i>
                  </a>
                  <ul class="collapse list-unstyled" id="pageSubmenu3">
                      <li>
                          <a href="list-service.php">List Services</a>
                      </li>
                      <li>
                          <a href="service.php">Create Service</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false">
                      <i class="far fa-file"></i>
                      NAS
                      <i class="fas fa-angle-down fa-pull-right"></i>
                  </a>
                  <ul class="collapse list-unstyled" id="pageSubmenu4">
                      <li>
                          <a href="listnas.php">List NAS</a>
                      </li>
                      <li>
                          <a href="nas.php">Create NAS</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false">
                      <i class="far fa-file"></i>
                      Docs
                      <i class="fas fa-angle-down fa-pull-right"></i>
                  </a>
                  <ul class="collapse list-unstyled" id="pageSubmenu5">
                      <li>
                          <a href="intro.html">Introduction</a>
                      </li>
                      <li>
                          <a href="manusers.html">Users</a>
                      </li>
                      <li>
                          <a href="manservices.html">Services</a>
                      </li>
                  </ul>
              </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!-- Search-from -->
                    <form action="update.php" method="post" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <!--// Search-from -->
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="images/profile.png" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?php echo $_SESSION["username"];?></h3>
                                        <a href="mailto:info@example.com"><?php echo $_SESSION["username"];?></a>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-question-circle mr-3"></i>Faq</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-thumbs-up mr-3"></i>Support</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-thumbs-up mr-3"></i>Change Password</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->

            <?php

             $username = $_POST['username'];
              $password = $_POST['password'];
               $service = $_POST['service'];

               if(empty($username) || empty($password) || empty($service))
    {
        echo "You did not fill out the required fields.";
    }

     else {

            $sql = "SELECT * FROM radcheck WHERE username='$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) < 1) {


            $sql1 = "INSERT INTO radcheck (id ,username ,attribute ,op ,value )
            VALUES (NULL , '$username', 'MD5-Password', ':=', MD5( '$password' ) ),
            (NULL , '$username', 'Simultaneous-Use', ':=', '1');";

            $sql2 = "INSERT INTO radusergroup (username ,groupname ,priority )
            VALUES ('$username', '$service', '1');";


            if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {

            echo "<!-- main-heading -->
                      <h2>User Added</h2>
                      <!--// main-heading -->

                      <!-- Error Page Content -->
                      <div>

                          <!-- Error Page Info -->
                          <div>
                              <p>User $username Successfully added and allocated to $service</p>
                          </div>
                          <!--// Error Page Info -->

                      </div>";



            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            }

            else
            {

               echo "          <!-- main-heading -->
                         <h2>User is already registered</h2>
                         <!--// main-heading -->

                         <!-- Error Page Content -->
                         <div>

                             <!-- Error Page Info -->
                             <div>
                                 <p>User $username that you are trying to add, already has an account.</p>
                             </div>
                             <!--// Error Page Info -->

                         </div>";
            }

}
            ?>



            <!--// Error Page Content -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>

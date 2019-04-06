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
    <div class="bg-page py-5">




        <div class="container">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Modify User</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="edituser.php" method="post">
                                              <?php
                                               $search = $_POST['search'];

                                                 if(empty($search))
                                          {
                                          echo "You did not fill out the required fields.";
                                          }

                                          else {

                                              $sql = "SELECT * FROM radcheck WHERE username='$search'";
                                              $result = mysqli_query($conn, $sql);

                                              if (mysqli_num_rows($result) < 1) {
                                            //if there is no user such user in the database
                                            echo "          <!-- main-heading -->
                                                      <h2>Invalid User</h2>
                                                      <!--// main-heading -->

                                                      <!-- Error Page Content -->
                                                      <div>

                                                          <!-- Error Page Info -->
                                                          <div>
                                                              <p>User $search that you are trying to search, does not exist.</p>
                                                          </div>
                                                          <!--// Error Page Info -->

                                                      </div>";
                                              }

                                              else
                                              {
                                              //if there is an user
                                              $row = mysqli_fetch_assoc($result);
                                              ?>


                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" readonly="readonly" value="<?php echo $row["username"];?>">
                    </div>
                    <div class="form-group">
                        <label>Leave Password Blank if you don't wish to change the password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Service </label>
                        <select name="service">
                          <?php

                          $sql2 = "SELECT DISTINCT(groupname) FROM radgroupreply";
                          $result2 = mysqli_query($conn, $sql2);

                          while($row2 = mysqli_fetch_array($result2)) {
                           ?>
                             <option><?php echo $row2[groupname];?></option>

                                   <?php
                                     }
                                    ?>
  </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Update</button>
                    <button type="submit" name="delete" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Delete</button>

                </form>
                <?php
                    }
                  }
                  $sql3 = "SELECT groupname FROM radusergroup WHERE username = '$search'";
                  $result3 = mysqli_query($conn, $sql3);

                  $row3=mysqli_fetch_array($result3);
                   echo "Current User service: <strong>$row3[groupname]</strong>";
                ?>

            </div>

    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>

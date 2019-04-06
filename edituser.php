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
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Register User</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">

                <?php
                if(isset($_POST['update'])) {
        // code for update
                $service = $_POST[service];
                $username = $_POST[username];
                $password = $_POST[password];

                if(empty($password)){
                  $sql = "UPDATE radusergroup SET groupname='$service' WHERE username='$username'";

                if(mysqli_query($conn,"$sql")){
                  echo "Service changed to $service";
                }
                else{
                    echo mysqli_error($conn);
                }
                }
                else{


                  $sql2 = "UPDATE radcheck SET value= MD5( '$password' )  WHERE username='$username' AND attribute='MD5-Password'";

                  $sql3 = "UPDATE radusergroup SET groupname='$service' WHERE username='$username'";


                  if (mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {

                  echo "<!-- main-heading -->
                            <h2>User Updated</h2>
                            <!--// main-heading -->

                            <!-- Error Page Content -->
                            <div>

                                <!-- Error Page Info -->
                                <div>
                                    <p>User <strong>$username</strong> successfully updated and allocated to <strong>$service</strong></p>
                                </div>
                                <!--// Error Page Info -->

                            </div>";



                  } else {
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }

                }

      } elseif(isset($_POST['delete'])) {
        // code for delete

        $username = $_POST["username"];

        if (mysqli_query($conn,"DELETE FROM radcheck WHERE username = '$username'") && mysqli_query($conn, "DELETE FROM radusergroup WHERE username = '$username'"))
        {
        echo "User $delete successfully deleted";
        } else {
        echo mysqli_error($conn);
        }
                    }

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
